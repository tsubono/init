<?php

namespace App\Repositories\AdviserUser;

use App\Models\AdviserUser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class AdviserUserRepository
 *
 * @package App\Repositories\AdviserUser
 */
class AdviserUserRepository implements AdviserUserRepositoryInterface
{
    private AdviserUser $adviserUser;

    public function __construct(AdviserUser $adviserUser)
    {
        $this->adviserUser = $adviserUser;
    }

    /**
     * @param  string  $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->adviserUser->find($id);
    }

    /**
     * @param  int  $id
     * @param  array  $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $adviserUser = $this->adviserUser->findOrFail($id);
            $adviserUser->update($data);
            $this->updateRelation($adviserUser, $data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param  AdviserUser  $adviserUser
     * @param  array  $data
     */
    private function updateRelation(AdviserUser $adviserUser, array $data)
    {
        // 画像
        foreach ($data['images'] ?? [] as $sort => $image) {
            if (!is_null($image)) {
                $adviserUser->adviserUserImages()->updateOrCreate([
                    'sort' => $sort,
                ], ['image_path' => $image]);
            } else {
                $adviserUserImage = $adviserUser->adviserUserImages()
                    ->where('sort', $sort)->first();
                if (!empty($adviserUserImage)) {
                    $adviserUserImage->delete();
                }
            }
        }
        // カテゴリ
        if (isset($data['mst_category_ids'])) {
            $adviserUser->categories()->sync($data['mst_category_ids'] ?? []);
        }
        // 言語
        if (isset($data['mst_language_ids'])) {
            $adviserUser->languages()->sync($data['mst_language_ids'] ?? []);
        }
        // 動画
        foreach ($data['movies'] ?? [] as $sort => $movie) {
            if (!is_null($movie['eye_catch_path']) && !is_null($movie['type']) && !is_null($movie['movie_path'])) {
                $adviserUser->adviserUserMovies()->updateOrCreate(['sort' => $sort], $movie);
            } else {
                $adviserUserMovie = $adviserUser->adviserUserMovies()
                    ->where('sort', $sort)->first();
                if (!empty($adviserUserMovie)) {
                    $adviserUserMovie->delete();
                }
            }
        }
        // 個人情報確認画像
        foreach ($data['personal_images_1'] ?? [] as $sort => $image) {
            if (!is_null($image)) {
                $adviserUser->adviserUserPersonalInfos()->updateOrCreate([
                    'sort' => $sort,
                    'type' => '表面',
                ], [
                    'image_path' => $image
                ]);
            } else {
                $personalInfo = $adviserUser->adviserUserPersonalInfos()
                    ->where('sort', $sort)
                    ->where('type', '表面')
                    ->first();
                if (!empty($personalInfo)) {
                    $personalInfo->delete();
                }
            }
        }
        foreach ($data['personal_images_2'] ?? [] as $sort => $image) {
            if (!is_null($image)) {
                $adviserUser->adviserUserPersonalInfos()->updateOrCreate([
                    'sort' => $sort,
                    'type' => '裏面',
                ], [
                    'image_path' => $image
                ]);
            } else {
                $personalInfo = $adviserUser->adviserUserPersonalInfos()
                    ->where('sort', $sort)
                    ->where('type', '裏面')
                    ->first();
                if (!empty($personalInfo)) {
                    $personalInfo->delete();
                }
            }
        }
    }

    /**
     * @param  int  $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 30): LengthAwarePaginator
    {
        return $this->adviserUser
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    public function getByConditionPaginate(
        int $perCount,
        ?string $orderBy,
        ?string $category,
        ?string $language,
        ?string $name,
        ?string $country,
        ?string $residenceCountry,
        ?string $gender
    ): LengthAwarePaginator {
        $query = $this->adviserUser
            ->query()
            ->with('categories');

        if ($category) {
            $query->whereHas('categories', function (Builder $query) use ($category) {
                $query->where('name', $category);
            });
        }

        if ($language) {
            $query->whereHas('languages', function (Builder $query) use ($language) {
                $query->where('name', $language);
            });
        }

        if ($name) {
            $query
                ->where('family_name', 'like', "%$name%")
                ->orWhere('middle_name', 'like', "%$name%")
                ->orWhere('first_name', 'like', "%$name%")
                ->orWhere('family_name_kana', 'like', "%$name%")
                ->orWhere('middle_name_kana', 'like', "%$name%")
                ->orWhere('first_name_kana', 'like', "%$name%");
        }

        if ($country) {
            $query->whereHas('fromCountry', function (Builder $query) use ($country) {
                $query->where('name', $country);
            });
        }

        if ($residenceCountry) {
            $query->whereHas('residenceCountry', function (Builder $query) use ($residenceCountry) {
                $query->where('name', $residenceCountry);
            });
        }

        if ($gender) {
            $query->where('gender', $gender);
        }

        switch ($orderBy) {
            case 'fav':
                $query
                    ->withCount('attendances')
                    ->orderBy('attendances_count', 'desc');
                break;
            case 'evaluation':
                $query
                    ->withAvg('reviews', 'rate')
                    ->orderBy('reviews_avg_rate', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        return $query->paginate($perCount);
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
            $adviserUser = $this->adviserUser->findOrFail($id);
            $adviserUser->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
