<?php

namespace App\Http\Controllers\Mate;

use App\Http\Controllers\Controller;
use App\Repositories\MateUser\MateUserRepositoryInterface;
use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CoinController extends Controller
{
    private MateUserCoinRepositoryInterface $mateUserCoinRepository;
    private MateUserRepositoryInterface $mateUserRepository;

    /**
     * CoinController constructor.
     * @param MateUserCoinRepositoryInterface $mateUserCoinRepository
     * @param MateUserRepositoryInterface $mateUserRepository
     */
    public function __construct(
        MateUserCoinRepositoryInterface $mateUserCoinRepository,
        MateUserRepositoryInterface $mateUserRepository
    ) {
        $this->mateUserCoinRepository = $mateUserCoinRepository;
        $this->mateUserRepository = $mateUserRepository;
    }

    /**
     * コイン管理画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $coins = $this->mateUserCoinRepository->getByMateUserIdPaginate(auth()->guard('mate')->user()->id);

        return view('mate.coins.index', compact('coins'));
    }

    /**
     * コイン購入画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buy()
    {
        $mateUser = auth()->guard('mate')->user();
        $cardList = [];
        // 既にpayjpに登録済みの場合
        if (!empty($mateUser->payjp_customer_id)) {
            // カード一覧を取得
            \Payjp\Payjp::setApiKey(config('services.payjp.secret_key'));
            $cardDatas = \Payjp\Customer::retrieve($mateUser->payjp_customer_id)->cards->data;
            foreach ($cardDatas as $cardData) {
                $cardList[] = [
                    'id' =>  $cardData->id,
                    'number' =>  "**** **** **** {$cardData->last4}",
                    'brand' =>  $cardData->brand,
                    'exp_year' =>  $cardData->exp_year,
                    'exp_month' =>  $cardData->exp_month,
                    'name' =>  $cardData->name,
                ];
            }
        }

        return view('mate.coins.buy', compact('cardList'));
    }

    /**
     * PAY.JPによる決済処理
     */
    public function paymentByPayJp(Request $request)
    {
        if (empty($request->get('payjp-token')) && !$request->get('payjp_card_id')) {
            abort(404);
        }

        DB::beginTransaction();

        try {
            // ログインユーザー取得
            $mateUser = auth()->guard('mate')->user();
            //  シークレットキーを設定
            \Payjp\Payjp::setApiKey(config('services.payjp.secret_key'));

            // Customer設定 & 取得
            $customer = $this->getPayjpCustomer($request, $mateUser);

            //  支払い処理
            $charge = \Payjp\Charge::create([
                "customer" => $customer->id,
                "amount" => $request->price,
                "currency" => 'jpy',
                "description" => "受講者ユーザーID: {$mateUser->id} によるコイン購入"
            ]);

            /**
             * DB登録・更新
             */
            //  ユーザーにpayjpの顧客idを登録
            $this->mateUserRepository->update($mateUser->id, [
                'payjp_customer_id' => $customer->id
            ]);
            // コインレコード追加
            $this->mateUserCoinRepository->store([
                'mate_user_id' => $mateUser->id,
                'amount' => $request->price / 100,
                'payjp_charge_id' => $charge->id,
                'expiration_date' => now()->addMonths(config('const.coin_expiration_month')),
                'note' => 'PAY.JPによるコイン購入'
            ]);

            DB::commit();

            return redirect(route('mate.coins.index'))->with('success_message', __('message.The coin purchase is complete'));

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            if (strpos($e, 'has already been used') !== false) {
                return redirect()->back()->with('error_message', __('message.This is the card information that has already been registered.'));
            }

            if (strpos($e, 'already has the same card') !== false) {
                return redirect()->back()->with('error_message', __('message.This is the card information that has already been registered.'));
            }

            return redirect()->back()->with('error_message', __('message.A system error has occurred'));
        }
    }

    /**
     * Pay.jpのCustomerオブジェクトを設定&習得する
     *
     * @param Request $request
     * @param $mateUser
     * @return \Payjp\Customer
     */
    private function getPayjpCustomer(Request $request, $mateUser)
    {
        // 以前使用したカードを使う場合
        if (!empty($request->get('payjp_card_id'))) {
            $customer = \Payjp\Customer::retrieve($mateUser['payjp_customer_id']);
            // 使用するカードを設定
            $customer->default_card = $request->get('payjp_card_id');
            $customer->save();
        // 既にpayjpに登録済みの場合
        } elseif (!empty($mateUser['payjp_customer_id'])) {
            // カード情報を追加
            $customer = \Payjp\Customer::retrieve($mateUser['payjp_customer_id']);
            $card = $customer->cards->create([
                'card' => $request->get('payjp-token'),
            ]);
            // 使用するカードを設定
            $customer->default_card = $card->id;
            $customer->save();
        // payjp未登録の場合
        } else {
            // payjpで顧客新規登録 & カード登録
            $customer = \Payjp\Customer::create([
                'card' => $request->get('payjp-token'),
                'description' => "受講者ユーザーID: {$mateUser->id}",
            ]);
        }

        return $customer;
    }
}
