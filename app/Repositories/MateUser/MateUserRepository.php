<?php

namespace App\Repositories\MateUser;

use App\Models\MateUser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class MateUserRepository
 *
 * @package App\Repositories\MateUser
 */
class MateUserRepository implements MateUserRepositoryInterface
{
    private MateUser $mateUser;

    public function __construct(MateUser $mateUser) {
        $this->mateUser = $mateUser;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->mateUser->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $mateUser = $this->mateUser->findOrFail($id);
            $mateUser->update($data);
            $this->updateRelation($mateUser, $data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param MateUser $mateUser
     * @param array $data
     */
    private function updateRelation(MateUser $mateUser, array $data)
    {
        // カテゴリ
        if (isset($data['mst_category_ids'])) {
            $mateUser->categories()->sync($data['mst_category_ids'] ?? []);
        }
        // 言語
        if (isset($data['mst_language_ids'])) {
            $mateUser->languages()->sync($data['mst_language_ids'] ?? []);
        }
    }

    /**
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 30): LengthAwarePaginator
    {
        return $this->mateUser
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
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
            $mateUser = $this->mateUser->findOrFail($id);
            $mateUser->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
