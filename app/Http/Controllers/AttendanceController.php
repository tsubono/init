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
use App\Notifications\AttendanceNotification;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\AttendanceSale\AttendanceSaleRepositoryInterface;
use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    public function index(Request $request)
    {
        $userType = auth()->guard('mate')->check() ? 'mate' : 'adviser';
        $mateUserId = $userType === 'mate' ? auth()->guard('mate')->user()->id : null;
        $adviserUserId = $userType === 'adviser' ? auth()->guard('adviser')->user()->id : null;
        $condition = $request->get('condition', []);

        $attendances = $this->attendanceRepository->getByConditionPaginate(
            $condition + [
                'mate_user_id' => $mateUserId,
                'adviser_user_id' => $adviserUserId,
            ]
        );

        return view('attendances.index', compact('attendances', 'userType', 'condition'));
    }

    /**
     * 受講詳細
     *
     * @param Attendance $attendance
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Attendance $attendance)
    {
        // 関係ないユーザーは弾く
        if (!$this->checkUser($attendance)) {
            abort(404);
        }

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

        DB::beginTransaction();
        try {
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
                    'datetime' => "{$request->date} {$request->time}:00"
                ]
            );

            /************* 通知 *************/
            // アドバイザーへ受講申請メール通知
            Mail::to($lesson->adviserUser->email)->send(
                new AttendanceRequestMail($attendance)
            );
            // アドバイザーへDB通知登録
            $lesson->adviserUser->notify(new AttendanceNotification(
                "「{$lesson->name}」へ受講申請が届きました",
                $attendance->mateUser->avatar_image,
                $attendance->mateUser->full_name,
                route('attendances.show', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('lessons.show', compact('lesson')))->with('success_message', '受講申請が完了しました');
    }

    /**
     * 受講申請キャンセル
     *
     * @param Attendance $attendance
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancelRequest(Attendance $attendance, Request $request)
    {
        // メイトのみ実行可能
        if (!auth()->guard('mate')->check() || !$this->checkUser($attendance)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 受講ステータス更新
            $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_REQUEST_CANCEL,
            ]);
            // メイトが使用したコインを払い戻す
            $this->mateUserCoinRepository->store([
                'mate_user_id' => $attendance->mate_user_id,
                'amount' => -$attendance->mateUserCoin->amount, // 受講申請キャンセルなので受講時に使用した分を払い戻し
                'note' => "「{$attendance->lesson->name}」の受講申請キャンセルのため払い戻し",
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
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
        if (!auth()->guard('adviser')->check() || !$this->checkUser($attendance)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 受講ステータス更新
            $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_APPROVAL
            ]);

            /************* 通知 *************/
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($attendance->mateUser->is_notice) {
                // メイトへ受講申請結果メール通知
                Mail::to($attendance->mateUser->email)->send(
                    new AttendanceRequestResultMail($attendance)
                );
            }
            // メイトへDB通知登録
            $attendance->mateUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」への受講申請結果が届きました",
                $attendance->adviserUser->avatar_image,
                $attendance->adviserUser->full_name,
                route('attendances.show', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

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
        if (!auth()->guard('adviser')->check() || !$this->checkUser($attendance)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
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

            /************* 通知 *************/
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($attendance->mateUser->is_notice) {
                // メイトへ受講申請結果メール通知
                Mail::to($attendance->mateUser->email)->send(
                    new AttendanceRequestResultMail($attendance)
                );
            }
            // メイトへDB通知登録
            $attendance->mateUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」への受講申請結果が届きました",
                $attendance->adviserUser->avatar_image,
                $attendance->adviserUser->full_name,
                route('attendances.show', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

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
        if (!auth()->guard('adviser')->check() || !$this->checkUser($attendance)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 受講ステータス更新
            $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_CLOSED
            ]);
            // 受講に支払われた金額を算出
            $price = -$attendance->mateUserCoin->amount * 100;
            // マッチングフィーを算出
            $fee = $price * ($attendance->adviserUser->fee_rate / 100); 
            // アドバイザー売上レコード登録
            $this->attendanceSaleRepository->store([
                'adviser_user_id' =>  $attendance->adviser_user_id,
                'attendance_id' => $attendance->id,
                'name' => $attendance->lesson->name,
                'coin_amount' => $attendance->lesson->coin_amount,
                'description' => $attendance->lesson->description,
                'price' => $price,
                'fee' => $fee,
                'subtotal' => $price - $fee,
                'status' => AttendanceSale::STATUS_CONFIRMED,
                'note' => "「{$attendance->lesson->name}」の受講完了により受講金額を取得",
            ]);

            /************* 通知 *************/
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($attendance->mateUser->is_notice) {
                // メイトへ受講完了メール通知
                Mail::to($attendance->mateUser->email)->send(
                    new AttendanceCloseMail($attendance)
                );
            }
            // メイトへDB通知登録
            $attendance->mateUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」の受講が完了しました",
                $attendance->adviserUser->avatar_image,
                $attendance->adviserUser->full_name,
                route('attendances.messages', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * キャンセル
     *
     * @param Attendance $attendance
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancel(Attendance $attendance)
    {
        // 関係ないユーザーは弾く
        if (!$this->checkUser($attendance)) {
            abort(404);
        }

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

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 受講ステータス更新
            $attendance = $this->attendanceRepository->update($attendance->id, [
                    'status' => Attendance::STATUS_CANCEL,
                ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));

            /************* 払い戻し処理 *********/
            // 受講の何日前かを取得
            $dayBefore = $this->dayBefore($attendance);
            auth()->guard('adviser')->check()
                ? $this->refundForCancelByAdviser($attendance, $dayBefore)
                : $this->refundForCancelByMate($attendance, $dayBefore);

            /************* 通知 *************/
            $toUser = auth()->guard('adviser')->check() ? $attendance->mateUser : $attendance->adviserUser;
            $fromUser = auth()->guard('adviser')->check() ? $attendance->adviserUser : $attendance->mateUser;
            $userType = is_null($cancel_cause_mate_user_id) ? 'mate' : 'adviser';
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($userType === 'adviser' || ($userType === 'mate' && $attendance->mateUser->is_notice)) {
                // 相手ユーザーへキャンセルメール通知
                Mail::to($toUser->email)->send(
                    new AttendanceCancelMail($attendance, $userType)
                );
            }
            // 相手ユーザーへDB通知登録
            $toUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」の受講へのキャンセルが届きました",
                $fromUser->avatar_image,
                $fromUser->full_name,
                route('attendances.show', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

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
        // 関係ないユーザーは弾く
        if (!$this->checkUser($attendance)) {
            abort(404);
        }

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

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 受講ステータス更新
            $attendance = $this->attendanceRepository->update($attendance->id, [
                'status' => Attendance::STATUS_REPORT,
            ] + compact('cancel_cause_mate_user_id', 'cancel_cause_adviser_user_id'));

            /************* 払い戻し処理 *********/
            auth()->guard('adviser')->check()
                ? $this->refundForReportByAdviser($attendance)
                : $this->refundForReportByMate($attendance);

            /************* 通知 *************/
            $toUser = auth()->guard('adviser')->check() ? $attendance->mateUser : $attendance->adviserUser;
            $fromUser = auth()->guard('adviser')->check() ? $attendance->adviserUser : $attendance->mateUser;
            $userType = auth()->guard('adviser')->check() ? 'mate' : 'adviser';
            // メイトの場合は通知フラグがONの場合のみメール通知
            if ($userType === 'adviser' || ($userType === 'mate' && $attendance->mateUser->is_notice)) {
                // 相手ユーザーへ通報メール通知
                Mail::to($toUser->email)->send(
                    new AttendanceReportMail($attendance, $userType)
                );
            }
            // 相手ユーザーへDB通知登録
            $toUser->notify(new AttendanceNotification(
                "「{$attendance->lesson->name}」の受講への通報が届きました",
                $fromUser->avatar_image,
                $fromUser->full_name,
                route('attendances.show', compact('attendance'))
            ));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('attendances.index'))->with('success_message', 'ステータスを更新しました');
    }

    /**
     * アドバイザーからの通報による払い戻し処理
     * = メイトが受講に現れなかった
     *
     * ★ メイトへの受講料のコイン返還はしない
     * ★ 受講料の50％はアドバイザーが獲得
     * 
     * @param Attendance $attendance
     */
    private function refundForReportByAdviser(Attendance $attendance): void
    {
        // 受講に支払われた金額を算出
        $price = -$attendance->mateUserCoin->amount * 100;
        // アドバイザーは受講に支払われた金額の50%を獲得
        $price = $price / 2;
        // マッチングフィーを算出
        $fee = $price * ($attendance->adviserUser->fee_rate / 100);
        // アドバイザー売上レコード登録
        $this->attendanceSaleRepository->store([
            'adviser_user_id' =>  $attendance->adviser_user_id,
            'attendance_id' => $attendance->id,
            'name' => $attendance->lesson->name,
            'coin_amount' => $attendance->lesson->coin_amount,
            'description' => $attendance->lesson->description,
            'price' => $price,
            'fee' => $fee,
            'subtotal' => $price - $fee,
            'status' => AttendanceSale::STATUS_CONFIRMED,
            'note' => "「{$attendance->lesson->name}」への受講通報によりペナルティ金額を増額",
        ]);
    }

    /**
     * メイトからの通報による払い戻し処理
     * = アドバイザーが受講に現れなかった
     *
     * ★ メイトに全コイン返金
     * ★ アドバイザーからペナルティとして受講料の100％のキャンセル料を徴収
     *
     * @param Attendance $attendance
     */
    private function refundForReportByMate(Attendance $attendance): void
    {
        // 受講に支払われた金額を算出
        $price = -$attendance->mateUserCoin->amount * 100;

        /***** メイトへのコイン返金 *****/
        $this->mateUserCoinRepository->store([
            'mate_user_id' => $attendance->mate_user_id,
            'amount' => -$attendance->mateUserCoin->amount, // 全額返金のため使用した分を払い戻し
            'note' => "{$attendance->lesson->name}への通報による返金",
        ]);

        /***** アドバイザーへの売上減額 *****/
        // 売上をマイナスで登録
        $this->attendanceSaleRepository->store([
            'adviser_user_id' =>  $attendance->adviser_user_id,
            'attendance_id' => $attendance->id,
            'name' => $attendance->lesson->name,
            'coin_amount' => $attendance->lesson->coin_amount,
            'description' => $attendance->lesson->description,
            'price' => -$price,
            'subtotal' => -$price,
            'status' => AttendanceSale::STATUS_CONFIRMED,
            'note' => "メイトからの「{$attendance->lesson->name}」の受講通報によりペナルティ金額を減額",
        ]);
    }

    /**
     * アドバイザーからのキャンセルによる払い戻し
     *
     * ★ メイトに全コイン返金
     * ★ アドバイザーからペナルティとして(受講料 * 負担率)のペナルティ金額を徴収
     * 
     * @param Attendance $attendance
     * @param int $dayBefore
     */
    private function refundForCancelByAdviser(Attendance $attendance, int $dayBefore): void
    {
        // 受講に支払われた金額を算出
        $price = -$attendance->mateUserCoin->amount * 100;

        /***** メイトへのコイン返金 *****/
        $this->mateUserCoinRepository->store([
            'mate_user_id' => $attendance->mateUser->id,
            'amount' => -$attendance->mateUserCoin->amount, // 全額返金のため使用した分を払い戻し
            'note' => "{$attendance->lesson->name}のキャンセルによる返金",
        ]);

        /***** アドバイザーへの売上減額 *****/
        if ($dayBefore <= 7) {
            // 定数で設定している負担率から、ペナルティ金額を算出
            $penaltyPrice = $price * config('const.cancel_rate.to_adviser.' . $dayBefore);
            // 売上をマイナスで登録
            $this->attendanceSaleRepository->store([
                'adviser_user_id' =>  $attendance->adviser_user_id,
                'attendance_id' => $attendance->id,
                'name' => $attendance->lesson->name,
                'coin_amount' => $attendance->lesson->coin_amount,
                'description' => $attendance->lesson->description,
                'price' => -intval($penaltyPrice),
                'subtotal' => -intval($penaltyPrice),
                'status' => AttendanceSale::STATUS_CONFIRMED,
                'note' => "「{$attendance->lesson->name}」の受講キャンセルによりペナルティ金額を減額",
            ]);
        }
    }

    /**
     * メイトからのキャンセルによる払い戻し
     *
     * ★ メイトにペナルティ金額 (= 受講料 * 負担率) を差し引いたコインを返金
     * ★ アドバイザーはペナルティ金額の半分を獲得
     * 
     * @param Attendance $attendance
     * @param int $dayBefore
     */
    private function refundForCancelByMate(Attendance $attendance, int $dayBefore): void
    {
        // 受講に支払われた金額を算出
        $price = -$attendance->mateUserCoin->amount * 100;
        
        /***** メイトへのコイン返金 *****/
        // 定数で設定している負担率から、ペナルティ金額を算出 & コインに変換
        $penaltyAmount = -$attendance->mateUserCoin->amount - ($price * config('const.cancel_rate.to_mate.' . $dayBefore)) / 100;
        $this->mateUserCoinRepository->store([
            'mate_user_id' => $attendance->mateUser->id,
            'amount' => round($penaltyAmount),
            'note' => "「{$attendance->lesson->name}」の受講キャンセルによる返金",
        ]);

        /***** アドバイザーへの売上増額 *****/
        // アドバイザーにはペナルティ金額の50%を与える
        $halfPenaltyPrice = ceil($price * config('const.cancel_rate.to_mate.'. $dayBefore) / 2);
        $fee = intval($halfPenaltyPrice) * ($attendance->adviserUser->fee_rate / 100);
        // 売上を登録
        $this->attendanceSaleRepository->store([
            'adviser_user_id' =>  $attendance->adviser_user_id,
            'attendance_id' => $attendance->id,
            'name' => $attendance->lesson->name,
            'coin_amount' => $attendance->lesson->coin_amount,
            'description' => $attendance->lesson->description,
            'price' => intval($halfPenaltyPrice),
            'fee' => $fee,
            'subtotal' => intval($halfPenaltyPrice) - $fee,
            'status' => AttendanceSale::STATUS_CONFIRMED,
            'note' => "メイトからの「{$attendance->lesson->name}」の受講キャンセルによりペナルティ金額を増額",
        ]);
    }

    /**
     * キャンセルした日が受講日から何日前かを取得する
     *
     * @param Attendance $attendance
     * @return int
     */
    private function dayBefore(Attendance $attendance): int
    {
        $dateOfCourse = Carbon::parse($attendance->datetime)->startOfDay();
        $dayBefore = Carbon::now()->startOfDay()->diffInDays($dateOfCourse);
        // 7日前以上は負担率0%なので7日前を指定
        return $dayBefore > 7 ? 7 : $dayBefore;
    }

    /*
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
