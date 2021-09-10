<?php

namespace App\Repositories\MateUserCoin;

use App\Models\MateUserCoin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class MateUserCoinRepository
 *
 * @package App\Repositories\MateUserCoin
 */
class MateUserCoinRepository implements MateUserCoinRepositoryInterface
{
    private MateUserCoin $mateUserCoin;

    public function __construct(MateUserCoin $mateUserCoin) {
        $this->mateUserCoin = $mateUserCoin;
    }

    /**
     * @param array $data
     * @return MateUserCoin
     * @throws \Exception
     */
    public function store(array $data): MateUserCoin
    {
        DB::beginTransaction();

        try {
            $mateUserCoin = $this->mateUserCoin->create($data);

            DB::commit();

            return $mateUserCoin;
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
            $mateUserCoin = $this->mateUserCoin->findOrFail($id);
            $mateUserCoin->update($data);

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
        return $this->mateUserCoin
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param int $mateUserId
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByMateUserIdPaginate(int $mateUserId, int $perCount = 30): LengthAwarePaginator
    {
        return $this->mateUserCoin
            ->query()
            ->where('mate_user_id', $mateUserId)
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }
}
