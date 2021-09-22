<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\MailNotification;
use App\Mail\TransferRequestMail;
use App\Models\AttendanceSale;
use App\Models\TransferRequest;
use App\Repositories\AttendanceSale\AttendanceSaleRepositoryInterface;
use App\Repositories\TransferRequest\TransferRequestRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SaleController extends Controller
{
    private AttendanceSaleRepositoryInterface $attendanceSaleRepository;
    private TransferRequestRepositoryInterface $transferRequestRepository;

    /**
     * SaleController constructor.
     * @param AttendanceSaleRepositoryInterface $attendanceSaleRepository
     * @param TransferRequestRepositoryInterface $transferRequestRepository
     */
    public function __construct(
        AttendanceSaleRepositoryInterface $attendanceSaleRepository,
        TransferRequestRepositoryInterface $transferRequestRepository
    ) {
        $this->attendanceSaleRepository = $attendanceSaleRepository;
        $this->transferRequestRepository = $transferRequestRepository;
    }

    /**
     * (講師マイページ) 売上一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = $this->attendanceSaleRepository->getByAdviserUserIdPaginate(auth()->guard('adviser')->user()->id);
        $prices = $this->getPricesBySales($sales);

        return view('adviser.sales.index',
            compact('sales') + $prices);
    }

    /**
     * (講師マイページ) 振り込み申請
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function request()
    {
        $sales = $this->attendanceSaleRepository->getByAdviserUserIdPaginate(auth()->guard('adviser')->user()->id);
        $prices = $this->getPricesBySales($sales);

        DB::beginTransaction();
        try {
            /************* DB操作 *************/
            // 振り込み申請登録
            $transferRequest = $this->transferRequestRepository->store([
                    'adviser_user_id' => auth()->guard('adviser')->user()->id,
                    'price' => $prices['remainTotalPrice'],
                    'status' => TransferRequest::STATUS_PROGRESS,
                ]
            );
            // 対象の売上レコードのステータスを振り込み申請済みに更新する
            $this->attendanceSaleRepository->updateStatusToRequest(auth()->guard('adviser')->user()->id, $transferRequest->id);

            /************* メール通知 *************/
            // 管理者へメール送信
            Mail::to(config('mail.admin_email'))->send(
                new TransferRequestMail($transferRequest)
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('adviser.sales.index'))->with('success_message', '振り込み申請が完了しました');
    }

    private function getPricesBySales($sales)
    {
        $totalPrice = $remainTotalPrice = $scheduledTransferPrice = 0;
        foreach ($sales as $sale) {
            // 累計売上
            $totalPrice += $sale->subtotal;

            // 売上確定の場合
            if ($sale->status == AttendanceSale::STATUS_CONFIRMED) {
                // 売上金残高
                $remainTotalPrice += $sale->subtotal;
            }
            // 振り込み申請済みの場合 && 未振り込みの場合
            if ($sale->status == AttendanceSale::STATUS_REQUEST && $sale->transferRequest->status == TransferRequest::STATUS_PROGRESS) {
                // 振り込み予定金額
                $scheduledTransferPrice += $sale->subtotal;
            }
        }

        return compact(
            'totalPrice',
            'remainTotalPrice',
            'scheduledTransferPrice',
        );
    }
}
