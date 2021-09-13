<?php

namespace App\Repositories\AttendanceMessage;

use App\Models\AttendanceMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class AttendanceMessageRepository
 *
 * @package App\Repositories\AttendanceMessage
 */
class AttendanceMessageRepository implements AttendanceMessageRepositoryInterface
{
    private AttendanceMessage $attendanceMessage;

    public function __construct(AttendanceMessage $attendanceMessage) {
        $this->attendanceMessage = $attendanceMessage;
    }

    /**
     * @param array $data
     * @throws \Exception
     */
    public function store(array $data): void
    {
        DB::beginTransaction();

        try {
            $this->attendanceMessage->create($data);

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
            $attendanceMessage = $this->attendanceMessage->findOrFail($id);
            $attendanceMessage->update($data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
