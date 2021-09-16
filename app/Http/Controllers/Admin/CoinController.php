<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateUserCoin;
use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    private MateUserCoinRepositoryInterface $mateUserCoinRepository;

    /**
     * CoinController constructor.
     * @param MateUserCoinRepositoryInterface $mateUserCoinRepository
     */
    public function __construct(MateUserCoinRepositoryInterface $mateUserCoinRepository)
    {
        $this->mateUserCoinRepository = $mateUserCoinRepository;
    }

    /**
     * コイン一覧
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $condition = $request->get('condition', []);
        $coins = $this->mateUserCoinRepository->getByConditionPaginate($condition);

        return view('admin.coins.index', compact('coins', 'condition'));
    }

    /**
     * コイン詳細
     *
     * @param MateUserCoin $coin
     * @return \Illuminate\Contracts\View\View
     */
    public function show(MateUserCoin $coin)
    {
        return view('admin.coins.show', compact('coin'));
    }

    /**
     * コインCSVエクスポート
     *
     * @param Request $request
     * @param FileService $fileService
     * @return \Illuminate\Contracts\View\View
     */
    public function exportCsv(Request $request, FileService $fileService)
    {
        $condition = $request->get('condition', []);
        $coins = $this->mateUserCoinRepository->getByConditionPaginate($condition);

        $csvData = [];
        foreach ($coins as $index => $coin) {
            foreach ($this->getColumns() as $column) {
                if ($column === 'created_at' || $column === 'updated_at') {
                    $csvData[$index][$column] = Carbon::parse($coin->$column)->format('Y/m/d H:i');
                } else {
                    $csvData[$index][$column] = $coin->$column;
                }
            }
        }
        $columnLabels = $this->getColumnLabels();
        $columns = $this->getColumns();

        // エクスポート
        return $fileService->downloadCsv(
            $csvData,
            $columnLabels,
            $columns,
            'coins_'. Carbon::now()->format('YmdHis'). '.csv'
        );
    }

    /**
     * CSVのヘッダーに記載するカラム名
     *
     * @return string[]
     */
    private function getColumnLabels(): array
    {
        return [
            'ID',
            'メイトユーザーID',
            '枚数',
            'PAY.JP決済ID',
            'PayPal取引ID',
            'PayPal取引ステータス',
            '有効期限',
            '備考',
            '作成日時',
            '更新日時',
        ];
    }

    /**
     * CSVに記載するデータのキー名
     *
     * @return string[]
     */
    private function getColumns(): array
    {
        return [
            'id',
            'mate_user_id',
            'amount',
            'payjp_charge_id',
            'paypal_transaction_id',
            'paypal_transaction_status',
            'expiration_date',
            'note',
            'created_at',
            'updated_at',
        ];
    }
}
