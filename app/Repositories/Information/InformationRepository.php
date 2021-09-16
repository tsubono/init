<?php

namespace App\Repositories\Information;

use App\Models\Information;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class InformationRepository
 *
 * @package App\Repositories\Information
 */
class InformationRepository implements InformationRepositoryInterface
{
    private Information $information;

    public function __construct(Information $information) {
        $this->information = $information;
    }

    /**
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 15): LengthAwarePaginator
    {
        return $this->information
            ->query()
            ->orderBy('date', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $condition
     * @param int $perCount
     * @return LengthAwarePaginator
     */
    public function getByConditionPaginate(array $condition, int $perCount = 15): LengthAwarePaginator
    {
        $query = $this->information->query();

        if (!empty($condition['title'])) {
            $query->where('title', 'LIKE', "%{$condition['title']}%");
        }
        if (!empty($condition['content'])) {
            $query->where('content', 'LIKE', "%{$condition['content']}%");
        }
        if (!empty($condition['date_start'])) {
            $query->whereDate('date', '>=', $condition['date_start']);
        }
        if (!empty($condition['date_end'])) {
            $query->whereDate('date', '<=', $condition['date_end']);
        }

        return $query->orderBy('date', 'desc')->paginate($perCount);
    }

    /**
     * @param array $data
     * @return Information
     */
    public function store(array $data): Information
    {
        DB::beginTransaction();

        try {
            $information = $this->information->create($data);

            DB::commit();

            return $information;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Information
     */
    public function update(int $id, array $data): Information
    {
        DB::beginTransaction();

        try {
            $information = $this->information->findOrFail($id);
            $information->update($data);

            DB::commit();

            return $information;
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
            $information = $this->information->findOrFail($id);
            $information->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
