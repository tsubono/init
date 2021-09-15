<?php

namespace App\Repositories\InformationMail;

use App\Models\InformationMail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class InformationMailRepository
 *
 * @package App\Repositories\InformationMail
 */
class InformationMailRepository implements InformationMailRepositoryInterface
{
    private InformationMail $informationMail;

    public function __construct(InformationMail $informationMail) {
        $this->informationMail = $informationMail;
    }

    /**
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 10): LengthAwarePaginator
    {
        return $this->informationMail
            ->query()
            ->orderBy('date', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $data
     * @return InformationMail
     */
    public function store(array $data): InformationMail
    {
        DB::beginTransaction();

        try {
            $informationMail = $this->informationMail->create($data);

            DB::commit();

            return $informationMail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return InformationMail
     */
    public function update(int $id, array $data): InformationMail
    {
        DB::beginTransaction();

        try {
            $informationMail = $this->informationMail->findOrFail($id);
            $informationMail->update($data);

            DB::commit();

            return $informationMail;
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
            $informationMail = $this->informationMail->findOrFail($id);
            $informationMail->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
