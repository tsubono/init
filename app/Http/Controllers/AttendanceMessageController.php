<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceMessageRequest;
use App\Mail\AttendanceMessageMail;
use App\Models\Attendance;
use App\Models\AttendanceMessage;
use App\Notifications\AttendanceNotification;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\AttendanceMessage\AttendanceMessageRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AttendanceMessageController extends Controller
{
    private AttendanceRepositoryInterface $attendanceRepository;
    private AttendanceMessageRepositoryInterface $attendanceMessageRepository;

    /**
     * AttendanceController constructor.
     * @param AttendanceRepositoryInterface $attendanceRepository
     * @param AttendanceMessageRepositoryInterface $attendanceMessageRepository
     */
    public function __construct(
        AttendanceRepositoryInterface $attendanceRepository,
        AttendanceMessageRepositoryInterface $attendanceMessageRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
        $this->attendanceMessageRepository = $attendanceMessageRepository;
    }

    /**
     * 受講メッセージ
     *
     * @param Attendance $attendance
     * @return \Illuminate\Contracts\View\View
     */
    public function messages(Attendance $attendance)
    {
        // 関係ないユーザー & 受講承認前のものは弾く
        if (!$this->checkUser($attendance) ||
            ($attendance->status === Attendance::STATUS_REQUEST || $attendance->status === Attendance::STATUS_REJECT)) {
            abort(404);
        }

        // 既読にする
        $fromUserColumn = auth()->guard('adviser')->check() ? 'mate_user_id' : 'adviser_user_id';
        $this->attendanceRepository->updateMessagesToRead($attendance->id, $fromUserColumn);

        return view('attendances.messages', compact('attendance'));
    }

    /**
     * 受講メッセージ送信
     *
     * @param Attendance $attendance
     * @param AttendanceMessageRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sendMessage(Attendance $attendance, AttendanceMessageRequest $request)
    {
        // 関係ないユーザー & 受講承認前のものは弾く
        if (!$this->checkUser($attendance) ||
            ($attendance->status === Attendance::STATUS_REQUEST || $attendance->status === Attendance::STATUS_REJECT)) {
            abort(404);
        }

        // ログインしているユーザーIDを取得
        $adviserUserId = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user()->id : null;
        $mateUserId = auth()->guard('mate')->check() ? auth()->guard('mate')->user()->id : null;

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // メッセージ登録
            $this->attendanceMessageRepository->store($request->all() + [
                    'attendance_id' => $attendance->id,
                    'adviser_user_id' => $adviserUserId,
                    'mate_user_id' => $mateUserId,
            ]);

            /************* 通知 *************/
            $toUser = !is_null($adviserUserId) ? $attendance->mateUser : $attendance->adviserUser;
            $fromUser = !is_null($adviserUserId) ? $attendance->adviserUser : $attendance->mateUser;
            $userType = !is_null($adviserUserId) ? 'mate' : 'adviser';
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($userType === 'adviser' || ($userType === 'mate' && $attendance->mateUser->is_notice)) {
                // 相手ユーザーへメッセージメール通知
                Mail::to($toUser->email)->send(
                    new AttendanceMessageMail($attendance, $userType)
                );
            }
            // 相手ユーザーへDB通知登録
            $toUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」へ受講メッセージが届きました",
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

        return redirect(route('attendances.messages', compact('attendance')))->with('success_message', 'メッセージを送信しました');
    }

    /**
     * メッセージ添付ファイルをダウンロード
     *
     * @param Attendance $attendance
     * @param AttendanceMessage $attendanceMessage
     * @param int $fileIndex
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadMessageFile(Attendance $attendance, AttendanceMessage $attendanceMessage, int $fileIndex)
    {
        // 関係ないユーザーは弾く
        if (!$this->checkUser($attendance)) {
            abort(404);
        }

        $filePathColumn = "file_path_{$fileIndex}";
        $fileNameColumn = "file_name_{$fileIndex}";

        return Storage::disk('public')
            ->download(str_replace('/storage', '', $attendanceMessage->$filePathColumn), $attendanceMessage->$fileNameColumn);
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
