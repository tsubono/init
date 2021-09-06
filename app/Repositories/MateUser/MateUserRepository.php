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

            // TODO: リレーションの更新

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
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
}
