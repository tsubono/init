<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Mail\AttendanceCancelMail;
use App\Mail\AttendanceCloseMail;
use App\Mail\AttendanceReportMail;
use App\Mail\AttendanceRequestMail;
use App\Mail\AttendanceRequestResultMail;
use App\Models\Attendance;
use App\Models\AttendanceSale;
use App\Models\Lesson;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\AttendanceSale\AttendanceSaleRepositoryInterface;
use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AttendanceController extends Controller
{
    private AttendanceRepositoryInterface $attendanceRepository;
    private MateUserCoinRepositoryInterface $mateUserCoinRepository;
    private AttendanceSaleRepositoryInterface $attendanceSaleRepository;

    /**
     * AttendanceController constructor.
     * @param AttendanceRepositoryInterface $attendanceRepository
     * @param MateUserCoinRepositoryInterface $mateUserCoinRepository
     * @param AttendanceSaleRepositoryInterface $attendanceSaleRepository
     */
    public function __construct(
        AttendanceRepositoryInterface $attendanceRepository,
        MateUserCoinRepositoryInterface $mateUserCoinRepository,
        AttendanceSaleRepositoryInterface $attendanceSaleRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
        $this->mateUserCoinRepository = $mateUserCoinRepository;
        $this->attendanceSaleRepository = $attendanceSaleRepository;
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

        /************* DB操作 *************/
        // コイン使用登録
        $mateUserCoin = $this->mateUserCoinRepository->store([
            'mate_user_id' => auth()->guard('mate')->user()->id,
            'amount' => -$lesson->coin_amount, // 使用なのでマイナス
            'note' => "{$lesson->name}の受講に使用",
        ]);
        // 受講登録
        $attendance = $this->attendanceRepository->store(
            $request->all() + [
                'mate_user_id' => auth()->guard('mate')->user()->id,
                'adviser_user_id' => $lesson->adviser_user_id,
                'lesson_id' => $lesson->id,
                'mate_user_coin_id' => $mateUserCoin->id,
                'status' => Attendance::STATUS_REQUEST,
                'datetime' => "{$request->date} {$request->time}"
            ]
        );

        /************* メール通知 *************/
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

        /************* DB操作 *************/
        // 受講ステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_APPROVAL
        ]);
        // アドバイザー売上登録
        $this->attendanceSaleRepository->store([
           'adviser_user_id' =>  $attendance->adviser_user_id,
            'attendance_id' => $attendance->id,
            'name' => $attendance->lesson->name,
            'coin_amount' => $attendance->lesson->coin_amount,
            'description' => $attendance->lesson->description,
            'price' => $attendance->lesson->coin_amount * 100,
            'fee' => 0, // TODO: 手数料計算
            'subtotal' => $attendance->lesson->coin_amount * 100,
            'status' => AttendanceSale::STATUS_PENDING,
        ]);

        /************* メール通知 *************/
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

        /************* DB操作 *************/
        // 受講ステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_REJECT,
            'reject_text' => $request->reject_text,
        ]);
        // メイトが使用したコインを払い戻す
        $this->mateUserCoinRepository->store([
            'mate_user_id' => $attendance->mate_user_id,
            'amount' => -$attendance->mateUserCoin->amount, // 否認なので受講時に使用した分を払い戻し
            'note' => "{$attendance->lesson->name}の受講否認のため払い戻し",
        ]);

        /************* メール通知 *************/
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

        /************* DB操作 *************/
        // 受講ステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_CANCEL,
            ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));
        // TODO: 払い戻し処理


        /************* メール通知 *************/
        // 相手ユーザーへキャンセルメール通知
        $email = is_null($cancel_cause_mate_user_id) ? $attendance->mateUser->email : $attendance->adviserUser->email;
        $userType = is_null($cancel_cause_mate_user_id) ? 'mate' : 'adviser';
        Mail::to($email)->send(
            new AttendanceCancelMail($attendance, $userType)
        );

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

        /************* DB操作 *************/
        // 受講ステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_REPORT,
        ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));

        /************* 払い戻し ************/
        $this->refund($attendance);

        /************* メール通知 *************/
        // 相手ユーザーへ通報メール通知
        $email = !is_null($cancel_cause_mate_user_id) ? $attendance->mateUser->email : $attendance->adviserUser->email;
        $userType = !is_null($cancel_cause_mate_user_id) ? 'mate' : 'adviser';
        Mail::to($email)->send(
            new AttendanceReportMail($attendance, $userType)
        );


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

        /************* DB操作 *************/
        // 受講ステータス更新
        $attendance = $this->attendanceRepository->update($attendance->id, [
            'status' => Attendance::STATUS_CLOSED
        ]);
        // TODO: アドバイザーの売上レコードのステータス更新


        /************* メール通知 *************/
        // メイトへ受講完了メール通知
        Mail::to($attendance->mateUser->email)->send(
            new AttendanceCloseMail($attendance)
        );

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * 払い戻し処理
     * 
     * @param Attendance $attendance
     */
    private function refund(Attendance $attendance): void
    {
        if (auth()->guard('adviser')->check()) {
            // 生徒が授業に現れなかった場合
            $this->attendanceSaleRepository->updatePriceByReport($attendance->id, [
                'price' => $attendance->lesson->coin_amount * 50
            ]);
        } else {
            // メイトへの通報返金(講師が授業に現れなかった場合)
            $this->mateUserCoinRepository->store([
                'mate_user_id' => $attendance->mate_user_id,
                'amount' => -$attendance->mateUserCoin->amount, // 全額返金のため使用した分を払い戻し
                'note' => "{$attendance->lesson->name}の通報返金",
            ]);
            $this->attendanceSaleRepository->updatePriceByReport($attendance->id, [
                'price' => 0,
            ]);
        }
    }
}
