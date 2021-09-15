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
    public function getPaginate(int $perCount = 10): LengthAwarePaginator
    {
        return $this->information
            ->query()
            ->orderBy('date', 'desc')
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
            $this->information->create($data);

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
            $information = $this->information->findOrFail($id);
            $information->update($data);

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
