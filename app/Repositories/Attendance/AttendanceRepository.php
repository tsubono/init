<?php

namespace App\Repositories\Attendance;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
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
    public function getPaginate(int $perCount = 15): LengthAwarePaginator
    {
        return $this->attendance
            ->query()
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $condition
     * @param int $perCount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByConditionPaginate(array $condition, int $perCount = 15): LengthAwarePaginator
    {
        $query = $this->getQueryWithCondition($condition);

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate($perCount);
    }

    /**
     * @param array $condition
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getQueryWithCondition(array $condition): Builder
    {
        $query = $this->attendance->query();

        if (!empty($condition['adviser_user_id'])) {
            $query->where('adviser_user_id', $condition['adviser_user_id']);
        }
        if (!empty($condition['mate_user_id'])) {
            $query->where('mate_user_id', $condition['mate_user_id']);
        }
        if (!empty($condition['lesson_name'])) {
            $query->whereHas('lesson', function ($query) use ($condition) {
                $query->where('lessons.name', 'LIKE', "%{$condition['lesson_name']}%");
            });
        }
        if (!empty($condition['user_name'])) {
            if (auth()->guard('adviser')->check()) {
                $query->whereHas('mateUser', function ($query) use ($condition) {
                    $query->where(function ($query) use ($condition) {
                        $query->where('mate_users.family_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('mate_users.middle_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('mate_users.first_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('mate_users.family_name_kana', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('mate_users.middle_name_kana', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('mate_users.first_name_kana', 'LIKE', "%{$condition['user_name']}%");
                    });
                });
            } else {
                $query->whereHas('adviserUser', function ($query) use ($condition) {
                    $query->where(function ($query) use ($condition) {
                        $query->where('adviser_users.family_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('adviser_users.middle_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('adviser_users.first_name', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('adviser_users.family_name_kana', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('adviser_users.middle_name_kana', 'LIKE', "%{$condition['user_name']}%")
                            ->orWhere('adviser_users.first_name_kana', 'LIKE', "%{$condition['user_name']}%");
                    });
                });
            }
        }
        if (!empty($condition['status'])) {
            $query->where('status', $condition['status']);
        }
        if (!empty($condition['date_start'])) {
            $query->whereDate('datetime', '>=', $condition['date_start']);
        }
        if (!empty($condition['date_end'])) {
            $query->whereDate('datetime', '<=', $condition['date_end']);
        }

        return $query;
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
