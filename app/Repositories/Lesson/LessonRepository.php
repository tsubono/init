<?php

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class LessonRepository
 *
 * @package App\Repositories\Lesson
 */
class LessonRepository implements LessonRepositoryInterface
{
    private Lesson $lesson;

    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * @param  int  $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 15): LengthAwarePaginator
    {
        return $this->lesson
            ->query()
            ->orderBy('updated_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param  int  $adviserUserId
     * @param  int  $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByAdviserIdPaginate(int $adviserUserId, int $perCount = 15): LengthAwarePaginator
    {
        return $this->lesson
            ->query()
            ->where('adviser_user_id', $adviserUserId)
            ->orderBy('updated_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param  int  $perCount
     * @param  string|null  $category
     * @param  string|null  $language
     * @param  string|null  $room
     * @param  string|null  $country
     * @param  string|null  $gender
     * @param  int|null  $coinMin
     * @param  int|null  $coinMax
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByConditionPaginate(
        int $perCount,
        ?string $orderBy = null,
        ?string $category = null,
        ?string $language = null,
        ?string $room = null,
        ?string $country = null,
        ?string $gender = null,
        ?int $coinMin = null,
        ?int $coinMax = null
    ): LengthAwarePaginator {
        $query = $this->lesson
            ->query()
            ->with('categories')
            ->with('adviserUser')
            ->with('adviserUser.languages');

        if ($category) {
            $query->whereHas('categories', function (Builder $query) use ($category) {
                $query->where('name', $category)
                    ->orWhere('name_en', $category);
            });
        }

        if ($language) {
            $query->whereHas('adviserUser.languages', function (Builder $query) use ($language) {
                $query->where('name', $language)
                    ->orWhere('name_en', $language);
            });
        }

        if ($room) {
            $query->where('name', 'like', "%$room%");
        }

        if ($country) {
            $query->whereHas('adviserUser.fromCountry', function (Builder $query) use ($country) {
                $query->where('name', $country)
                    ->orWhere('name_en', $country);
            });
        }

        if ($gender) {
            $query->whereHas('adviserUser', function (Builder $query) use ($gender) {
                $query->where('gender', $gender);
            });
        }

        if ($coinMin) {
            $query->where('coin_amount', '>=', $coinMin);
        }

        if ($coinMax) {
            $query->where('coin_amount', '<=', $coinMax);
        }

        switch ($orderBy) {
            case 'fav':
                $query
                    ->withCount('attendances')
                    ->orderBy('attendances_count', 'desc');
                break;
            case 'coin-little':
                $query->orderBy('coin_amount');
                break;
            case 'coin-many':
                $query->orderBy('coin_amount', 'desc');
                break;
            case 'evaluation':
                $query
                    ->withAvg('reviews', 'rate')
                    ->orderBy('reviews_avg_rate', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        return $query->where('is_stop', 0)->paginate($perCount);
    }

    /**
     * @param  array  $data
     * @return void
     */
    public function store(array $data): void
    {
        DB::beginTransaction();

        try {
            $lesson = $this->lesson->create($data);

            // 画像
            foreach ($data['images'] ?? [] as $sort => $image) {
                if (!is_null($image)) {
                    $lesson->images()->create([
                        'sort' => $sort,
                        'image_path' => $image
                    ]);
                }
            }
            // カテゴリ
            $lesson->categories()->sync($data['mst_category_ids'] ?? []);
            // 動画
            foreach ($data['movies'] ?? [] as $sort => $movie) {
                if (!is_null($movie['eye_catch_path']) && !is_null($movie['type']) && !is_null($movie['movie_path'])) {
                    $lesson->movies()->create(['sort' => $sort] + $movie);
                }
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param  int  $id
     * @param  array  $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $lesson = $this->lesson->findOrFail($id);
            $lesson->update($data);

            // 画像
            foreach ($data['images'] ?? [] as $sort => $image) {
                if (!is_null($image)) {
                    $lesson->images()->updateOrCreate([
                        'sort' => $sort,
                    ], [ 'image_path' => $image ]);
                } else {
                    $image = $lesson->images()
                        ->where('sort', $sort)->first();
                    if (!empty($image)) {
                        $image->delete();
                    }
                }
            }
            // カテゴリ
            $lesson->categories()->sync($data['mst_category_ids'] ?? []);
            // 動画
            foreach ($data['movies'] ?? [] as $sort => $movie) {
                if (!is_null($movie['eye_catch_path']) && !is_null($movie['type']) && !is_null($movie['movie_path'])) {
                    $lesson->movies()->updateOrCreate(['sort' => $sort], $movie);
                } else {
                    $movie = $lesson->movies()
                        ->where('sort', $sort)->first();
                    if (!empty($movie)) {
                        $movie->delete();
                    }
                }
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param  int  $id
     * @return void
     * @throws \Exception
     */
    public function destroy(int $id): void
    {
        DB::beginTransaction();
        try {
            $lesson = $this->lesson->findOrFail($id);
            $lesson->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $adviserUserId
     */
    public function stopByAdviserUserId(int $adviserUserId): void
    {
        $this->lesson
            ->query()
            ->where('adviser_user_id', $adviserUserId)
            ->update(['is_stop' => 1]);
    }
}
