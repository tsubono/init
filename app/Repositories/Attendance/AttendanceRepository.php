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
     * @param int $adviserUserId
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByAdviserUserIdPaginate(int $adviserUserId, int $perCount = 10): LengthAwarePaginator
    {
        return $this->attendance
            ->query()
            ->where('adviser_user_id', $adviserUserId)
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param int $mateUserId
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByMateUserIdPaginate(int $mateUserId, int $perCount = 10): LengthAwarePaginator
    {
        return $this->attendance
            ->query()
            ->where('mate_user_id', $mateUserId)
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $data
     * @return Attendance
     */
    public function store(array $data): Attendance
    {
        DB::beginTransaction();

        try {
            $attendance = $this->attendance->create($data);

            DB::commit();

            return $attendance;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Attendance
     */
    public function update(int $id, array $data): Attendance
    {
        DB::beginTransaction();

        try {
            $attendance = $this->attendance->findOrFail($id);
            $attendance->update($data);

            DB::commit();

            return $attendance;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * 紐づくメッセージを既読にする
     *
     * @param int $attendanceId
     * @param string $fromUserColumn
     * @throws \Exception
     */
    public function updateMessagesToRead(int $attendanceId, string $fromUserColumn): void
    {
        DB::beginTransaction();
        try {

            $attendance = $this->attendance->findOrFail($attendanceId);
            // 既読ステータス更新処理
            $attendance->messages()
                ->where('is_read', false)
                ->whereNotNull($fromUserColumn)
                ->update([
                    'is_read' => true,
                ]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
