<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Mail\AttendanceReviewMail;
use App\Models\Attendance;
use App\Notifications\AttendanceNotification;
use App\Repositories\AttendanceReview\AttendanceReviewRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AttendanceReviewController extends Controller
{
    private AttendanceReviewRepositoryInterface $attendanceReviewRepository;

    /**
     * AttendanceReviewController constructor.
     * @param AttendanceReviewRepositoryInterface $attendanceReviewRepository
     */
    public function __construct(
        AttendanceReviewRepositoryInterface $attendanceReviewRepository
    ) {
        $this->attendanceReviewRepository = $attendanceReviewRepository;
    }

    /**
     * レビューフォーム
     *
     * @param Attendance $attendance
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function reviewForm(Attendance $attendance)
    {
        // レビュー権限がない もしくは 既にレビュー済みの場合
        if (!$attendance->can_review || $attendance->done_review) {
            abort(404);
        }

        return view('attendances.review', compact('attendance'));
    }

    /**
     * レビュー送信
     *
     * @param ReviewRequest $request
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function review(ReviewRequest $request, Attendance $attendance)
    {
        // レビュー権限がない場合
        if (!$attendance->can_review) {
            abort(404);
        }

        // ログインしているユーザーIDを取得
        $adviserUserId = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user()->id : null;
        $mateUserId = auth()->guard('mate')->check() ? auth()->guard('mate')->user()->id : null;

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // レビュー登録
            $this->attendanceReviewRepository->store($request->all() + [
                    'attendance_id' => $attendance->id,
                    'lesson_id' => $attendance->lesson_id,
                    'adviser_user_id' => $adviserUserId,
                    'mate_user_id' => $mateUserId,
            ]);

            /************* 通知 *************/
            $toUser = !is_null($adviserUserId) ? $attendance->mateUser : $attendance->adviserUser;
            $fromUser = !is_null($adviserUserId) ? $attendance->adviserUser : $attendance->mateUser;
            $userType = !is_null($adviserUserId) ? 'mate' : 'adviser';
            // 受講者の場合は通知フラグがONの場合のみメール通知
            if ($userType === 'adviser' || ($userType === 'mate' && $attendance->mateUser->is_notice)) {
                // 相手ユーザーへレビューメール通知
                Mail::to($toUser->email)->send(
                    new AttendanceReviewMail($attendance, $userType)
                );
            }
            // 相手ユーザーへDB通知登録
            $toUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」の受講レビューが届きました",
                $fromUser->avatar_image,
                $fromUser->full_name,
                route('attendances.messages', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('attendances.index'))->with('success_message', 'レビューを登録しました');
    }

    /**
     * 権限チェック
     *
     * @param Attendance $attendance
     * @return bool
     */
    private function checkUser(Attendance $attendance)
    {
        // 関係ないユーザーは弾く
        if ((auth()->guard('mate')->check() && auth()->guard('mate')->user()->id != $attendance->mate_user_id) ||
            (auth()->guard('adviser')->check() && auth()->guard('adviser')->user()->id != $attendance->adviser_user_id)) {
            return false;
        }

        return true;
    }
}
