<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Mail\AttendanceCancelMail;
use App\Mail\AttendanceCloseMail;
use App\Mail\AttendanceReportMail;
use App\Mail\AttendanceRequestMail;
use App\Mail\AttendanceRequestResultMail;
use App\Models\Attendance;
use App\Models\Lesson;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AttendanceController extends Controller
{
    private AttendanceRepositoryInterface $attendanceRepository;

    /**
     * AttendanceController constructor.
     * @param AttendanceRepositoryInterface $attendanceRepository
     */
    public function __construct(
        AttendanceRepositoryInterface $attendanceRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
    }

    /**
     * 受講一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->guard('mate')->check()) {
            $userType = 'mate';
            $attendances = $this->attendanceRepository->getByMateUserIdPaginate(auth()->guard('mate')->user()->id);
        } else {
            $userType = 'adviser';
            $attendances = $this->attendanceRepository->getByAdviserUserIdPaginate(auth()->guard('adviser')->user()->id);
        }

        return view('attendances.index', compact('attendances', 'userType'));
    }

    /**
     * 受講詳細
     *
     * @param Attendance $attendance
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * 受講申請
     *
     * @param Lesson $lesson
     * @param AttendanceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function request(Lesson $lesson, AttendanceRequest $request)
    {
        // メイトのみ実行可能
        if (!auth()->guard('mate')->check()) {
            abort(404);
        }

        // DB登録
        $attendance = $this->attendanceRepository->store(
            $request->all() + [
                'mate_user_id' => auth()->guard('mate')->user()->id,
                'adviser_user_id' => $lesson->adviser_user_id,
                'lesson_id' => $lesson->id,
                'status' => Attendance::STATUS_REQUEST,
                'datetime' => "{$request->date} {$request->time}"
            ]
        );

        // アドバイザーへ受講申請メール通知
        Mail::to($lesson->adviserUser->email)->send(
            new AttendanceRequestMail($attendance)
        );

        return redirect(route('lessons.show', compact('lesson')))->with('success_message', '受講申請が完了しました');
    }

    /**
     * 受講申請承認
     *
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approval(Attendance $attendance)
    {
        // アドバイザーのみ実行可能
        if (!auth()->guard('adviser')->check()) {
            abort(404);
        }

        // DBのステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_APPROVAL
        ]);

        // メイトへ受講申請結果メール通知
        Mail::to($attendance->mateUser->email)->send(
            new AttendanceRequestResultMail($attendance)
        );

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * 受講申請否認
     *
     * @param Attendance $attendance
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reject(Attendance $attendance, Request $request)
    {
        // アドバイザーのみ実行可能
        if (!auth()->guard('adviser')->check()) {
            abort(404);
        }

        // DBのステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_REJECT,
            'reject_text' => $request->reject_text,
        ]);

        // メイトへ受講申請結果メール通知
        Mail::to($attendance->mateUser->email)->send(
            new AttendanceRequestResultMail($attendance)
        );

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * 受講メッセージ
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function messages()
    {
        return view('adviser.attendances.show');
    }

    /**
     * 受講メッセージ送信
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMessage()
    {
        // TODO
    }

    /**
     * レビュー送信
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function review()
    {
        // TODO
    }

    /**
     * キャンセル
     *
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancel(Attendance $attendance)
    {
        $cancel_cause_mate_user_id = $cancel_cause_adviser_user_id = null;
        // キャンセルしたのがアドバイザーの場合
        if (auth()->guard('adviser')->check()) {
            // 原因はアドバイザー
            $cancel_cause_adviser_user_id = $attendance->adviser_user_id;
        // キャンセルしたのがメイトの場合
        } else {
            // 原因はメイト
            $cancel_cause_mate_user_id = $attendance->mate_user_id;
        }

        // DBのステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_CANCEL,
            ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));

        // 相手ユーザーへキャンセルメール通知
        $email = is_null($cancel_cause_mate_user_id) ? $attendance->mateUser->email : $attendance->adviserUser->email;
        $userType = is_null($cancel_cause_mate_user_id) ? 'mate' : 'adviser';
        Mail::to($email)->send(
            new AttendanceCancelMail($attendance, $userType)
        );

        // TODO: 払い戻し処理

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * 通報
     *
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function report(Attendance $attendance)
    {
        $cancel_cause_mate_user_id = $cancel_cause_adviser_user_id = null;
        // 通報したのがアドバイザーの場合
        if (auth()->guard('adviser')->check()) {
            // 原因はメイト
            $cancel_cause_mate_user_id = $attendance->mate_user_id;
        // 通報したのがメイトの場合
        } else {
            // 原因はアドバイザー
            $cancel_cause_adviser_user_id = $attendance->adviser_user_id;
        }

        // DBのステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_REPORT,
        ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));

        // 相手ユーザーへ通報メール通知
        $email = !is_null($cancel_cause_mate_user_id) ? $attendance->mateUser->email : $attendance->adviserUser->email;
        $userType = !is_null($cancel_cause_mate_user_id) ? 'mate' : 'adviser';
        Mail::to($email)->send(
            new AttendanceReportMail($attendance, $userType)
        );

        // TODO: 払い戻し処理

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * 受講完了
     *
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function close(Attendance $attendance)
    {
        // アドバイザーのみ実行可能
        if (!auth()->guard('adviser')->check()) {
            abort(404);
        }

        // DBのステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_CLOSED
        ]);

        // メイトへ受講完了メール通知
        Mail::to($attendance->mateUser->email)->send(
            new AttendanceCloseMail($attendance)
        );

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }
}
