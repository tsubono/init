<?php

namespace App\Repositories\AttendanceReview;

use App\Models\AttendanceReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class AttendanceReviewRepository
 *
 * @package App\Repositories\AttendanceReview
 */
class AttendanceReviewRepository implements AttendanceReviewRepositoryInterface
{
    private AttendanceReview $attendanceReview;

    public function __construct(AttendanceReview $attendanceReview) {
        $this->attendanceReview = $attendanceReview;
    }

    /**
     * @param array $data
     * @throws \Exception
     */
    public function store(array $data): void
    {
        DB::beginTransaction();

        try {
            $this->attendanceReview->create($data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
