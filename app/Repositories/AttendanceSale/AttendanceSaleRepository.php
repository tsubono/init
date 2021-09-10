<?php

namespace App\Repositories\AttendanceSale;

use App\Models\AttendanceSale;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class AttendanceSaleRepository
 *
 * @package App\Repositories\AttendanceSale
 */
class AttendanceSaleRepository implements AttendanceSaleRepositoryInterface
{
    private AttendanceSale $attendanceSale;

    public function __construct(AttendanceSale $attendanceSale) {
        $this->attendanceSale = $attendanceSale;
    }

    /**
     * @param array $data
     * @return AttendanceSale
     * @throws \Exception
     */
    public function store(array $data): AttendanceSale
    {
        DB::beginTransaction();

        try {
            $attendanceSale = $this->attendanceSale->create($data);

            DB::commit();

            return $attendanceSale;
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
            $attendanceSale = $this->attendanceSale->findOrFail($id);
            $attendanceSale->update($data);

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
        return $this->attendanceSale
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param int $adviserUserId
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByAdviserUserIdPaginate(int $adviserUserId, int $perCount = 30): LengthAwarePaginator
    {
        return $this->attendanceSale
            ->query()
            ->where('adviser_user_id', $adviserUserId)
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }
}
