<?php

namespace App\Repositories\Attendance;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class AttendanceRepository
 *
 * @package App\Repositories\Attendance
 */
class AttendanceRepository implements AttendanceRepositoryInterface
{
    private Attendance $attendance;

    public function __construct(Attendance $attendance) {
        $this->attendance = $attendance;
    }

    /**
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate(int $perCount = 10): LengthAwarePaginator
    {
        return $this->attendance
            ->query()
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
            $this->attendance->create($data);

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
            $attendance = $this->attendance->findOrFail($id);
            $attendance->update($data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
