<?php

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }

    /**
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 10): LengthAwarePaginator
    {
        return $this->lesson
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param int $adviserUserId
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByAdviserIdPaginate(int $adviserUserId, int $perCount = 10): LengthAwarePaginator
    {
        return $this->lesson
            ->query()
            ->where('adviser_user_id', $adviserUserId)
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        DB::beginTransaction();

        try {
            $lesson = $this->lesson->create($data);
            // TODO: リレーションの登録

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $lesson = $this->lesson->findOrFail($id);
            $lesson->update($data);

            // TODO: リレーションの更新

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
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
}
