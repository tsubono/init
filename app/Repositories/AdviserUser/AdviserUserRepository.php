<?php

namespace App\Repositories\AdviserUser;

use App\Models\AdviserUser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function __construct(AdviserUser $adviserUser) {
        $this->adviserUser = $adviserUser;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->adviserUser->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $adviserUser = $this->adviserUser->findOrFail($id);
            $adviserUser->update($data);

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
        return $this->adviserUser
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }
}
