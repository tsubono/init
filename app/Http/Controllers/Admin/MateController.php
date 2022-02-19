<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateUser;
use App\Repositories\MateUser\MateUserRepositoryInterface;
use App\Repositories\MateUserCoin\MateUserCoinRepositoryInterface;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MateController extends Controller
{
    private MateUserRepositoryInterface $mateUserRepository;
    private MateUserCoinRepositoryInterface $mateUserCoinRepository;

    /**
     * MateController constructor.
     * @param MateUserRepositoryInterface $mateUserRepository
     * @param MateUserCoinRepositoryInterface $mateUserCoinRepository
     */
    public function __construct(
        MateUserRepositoryInterface $mateUserRepository,
        MateUserCoinRepositoryInterface $mateUserCoinRepository
    ) {
        $this->mateUserRepository = $mateUserRepository;
        $this->mateUserCoinRepository = $mateUserCoinRepository;
    }

    /**
     * 受講者一覧
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $condition = $request->get('condition', []);

        $mateUsers = $this->mateUserRepository->getByConditionPaginate($condition);

        return view('admin.mates.index', compact('mateUsers', 'condition'));
    }

    /**
     * 受講者詳細
     *
     * @param MateUser $mateUser
     * @return \Illuminate\Contracts\View\View
     */
    public function show(MateUser $mateUser)
    {
        return view('admin.mates.show', compact('mateUser'));
    }

    /**
     * 受講者更新
     *
     * @param MateUser $mateUser
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MateUser $mateUser, Request $request)
    {
        $totalCoin = $mateUser->total_coin_amount;
        $newTotalCoin = $request->amount;

        if ($totalCoin != $newTotalCoin) {
            $this->mateUserCoinRepository->store([
                'mate_user_id' => $mateUser->id,
                'amount' => $newTotalCoin - $totalCoin,
                'expiration_date' => now()->addMonths(config('const.coin_expiration_month')),
                'note' => '運営によるコイン調整'
            ]);
        }

        return redirect(route('admin.mates.index'))->with('success_message', __('message.Update completed'));
    }

    /**
     * 受講者CSVエクスポート
     *
     * @param Request $request
     * @param FileService $fileService
     * @return \Illuminate\Contracts\View\View
     */
    public function exportCsv(Request $request, FileService $fileService)
    {
        $condition = $request->get('condition', []);
        $mateUsers = $this->mateUserRepository->getByCondition($condition);

        $csvData = [];
        foreach ($mateUsers as $index => $mateUser) {
            foreach ($this->getColumns() as $column) {
                if ($column === 'created_at' || $column === 'updated_at') {
                    $csvData[$index][$column] = Carbon::parse($mateUser->$column)->format('Y/m/d H:i');
                } elseif ($column === 'last_login_at') {
                    $csvData[$index][$column] = empty($mateUser->$column) ? '未ログイン' : Carbon::parse($mateUser->$column)->format('Y/m/d H:i');
                } else {
                    $csvData[$index][$column] = $mateUser->$column;
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
            'mate_users_'. Carbon::now()->format('YmdHis'). '.csv'
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
            '姓',
            'ミドルネーム',
            '名',
            '姓 (かな)',
            'ミドルネーム (かな)',
            '名 (かな)',
            'メールアドレス',
            '性別',
            '生年月日',
            '電話番号',
            'Skype名',
            'SkypeID',
            'アイコン画像',
            '出身国ID',
            '居住国ID',
            '自己PR',
            'payjp顧客ID',
            '通知フラグ',
            '最終ログイン日時',
            '登録日時',
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
            'family_name',
            'middle_name',
            'first_name',
            'family_name_kana',
            'middle_name_kana',
            'first_name_kana',
            'email',
            'gender',
            'birthday',
            'tel',
            'skype_name',
            'skype_id',
            'image_path',
            'from_country_id',
            'residence_country_id',
            'pr_text',
            'payjp_customer_id',
            'is_notice',
            'last_login_at',
            'created_at',
            'updated_at',
        ];
    }
}
