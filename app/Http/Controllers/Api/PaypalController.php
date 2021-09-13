<?php

namespace App\Http\Controllers\Api;

use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaypalController extends Controller
{
    private MateUserCoinRepositoryInterface $mateUserCoinRepository;

    public function __construct(
        MateUserCoinRepositoryInterface $mateUserCoinRepository
    ) {
        $this->mateUserCoinRepository = $mateUserCoinRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderCapture(Request $request): JsonResponse
    {
        $this->mateUserCoinRepository->store([
            'mate_user_id' => $request->user_id,
            'amount' => $request->amount,
            'paypal_transaction_id' => $request->transaction_id,
            'paypal_transaction_status' => $request->transaction_status,
            'expiration_date' => now()->addMonths(config('const.coin_expiration_month')),
            'note' => 'PayPalによるコイン購入'
        ]);

        session()->flash('success_message', 'コイン購入が完了しました');

        return response()->json(['status' => 'ok']);
    }
}
