<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Mail\AttendanceRequestMail;
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
        return view('attendances.index');
    }

    /**
     * 受講詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('attendances.show');
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

        // アドバイザーへメール通知
        Mail::to($lesson->adviserUser->email)->send(
            new AttendanceRequestMail($attendance)
        );

        return redirect(route('lessons.show', compact('lesson')))->with('success_message', '受講申請が完了しました');
    }

    /**
     * 受講申請承認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approval()
    {
        // アドバイザーのみ実行可能
        if (!auth()->guard('adviser')->check()) {
            abort(404);
        }
    }

    /**
     * 受講申請否認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reject()
    {
        // アドバイザーのみ実行可能
        if (!auth()->guard('adviser')->check()) {
            abort(404);
        }
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cancel()
    {
        // TODO
    }

    /**
     * 通報
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
    {
        // TODO
    }
}
