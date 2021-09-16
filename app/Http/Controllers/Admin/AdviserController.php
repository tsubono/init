<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdviserUser;
use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdviserController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;

    /**
     * AdviserController constructor.
     * @param AdviserUserRepositoryInterface $adviserUserRepository
     */
    public function __construct(AdviserUserRepositoryInterface $adviserUserRepository)
    {
        $this->adviserUserRepository = $adviserUserRepository;
    }

    /**
     * アドバイザー一覧
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $condition = $request->get('condition', []);

        $adviserUsers = $this->adviserUserRepository->getByConditionPaginate($condition);

        return view('admin.advisers.index', compact('adviserUsers', 'condition'));
    }

    /**
     * アドバイザー詳細
     *
     * @param AdviserUser $adviserUser
     * @return \Illuminate\Contracts\View\View
     */
    public function show(AdviserUser $adviserUser)
    {
        return view('admin.advisers.show', compact('adviserUser'));
    }

    /**
     * アドバイザー更新
     *
     * @param AdviserUser $adviserUser
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AdviserUser $adviserUser, Request $request)
    {
        $this->adviserUserRepository->update($adviserUser->id, $request->all());

        return redirect(route('admin.advisers.index'))->with('success_message', '更新が完了しました');
    }

    /**
     * アドバイザーCSVエクスポート
     *
     * @param Request $request
     * @param FileService $fileService
     * @return \Illuminate\Contracts\View\View
     */
    public function exportCsv(Request $request, FileService $fileService)
    {
        $condition = $request->get('condition', []);
        $adviserUsers = $this->adviserUserRepository->getByCondition($condition);

        $csvData = [];
        foreach ($adviserUsers as $index => $adviserUser) {
            foreach ($this->getColumns() as $column) {
                if ($column === 'created_at' || $column === 'updated_at') {
                    $csvData[$index][$column] = Carbon::parse($adviserUser->$column)->format('Y/m/d H:i');
                } elseif ($column === 'last_login_at') {
                    $csvData[$index][$column] = empty($adviserUser->$column) ? '未ログイン' : Carbon::parse($adviserUser->$column)->format('Y/m/d H:i');
                } else {
                    $csvData[$index][$column] = $adviserUser->$column;
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
            'adviser_users_'. Carbon::now()->format('YmdHis'). '.csv'
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
            '郵便番号',
            '住所',
            'Skype名',
            'SkypeID',
            '出身国ID',
            '居住国ID',
            '保有する資格',
            '自己PR',
            'レッスン可能時間帯 (月:start)',
            'レッスン可能時間帯 (月:end)',
            'レッスン可能時間帯 (火:start)',
            'レッスン可能時間帯 (火:end)',
            'レッスン可能時間帯 (水:start)',
            'レッスン可能時間帯 (水:end)',
            'レッスン可能時間帯 (木:start)',
            'レッスン可能時間帯 (木:end)',
            'レッスン可能時間帯 (金:start)',
            'レッスン可能時間帯 (金:end)',
            'レッスン可能時間帯 (土:start)',
            'レッスン可能時間帯 (土:end)',
            'レッスン可能時間帯 (日:start)',
            'レッスン可能時間帯 (日:end)',
            '講師をするきっかけ・理由',
            '講師をする意気込み',
            '支払い方法',
            'paypalメールアドレス',
            '口座画像1',
            '口座画像2',
            'マッチングフィー率 (%)',
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
            'zipcode',
            'address',
            'skype_name',
            'skype_id',
            'from_country_id',
            'residence_country_id',
            'qualification_text',
            'pr_text',
            'available_time_monday_start',
            'available_time_monday_end',
            'available_time_tuesday_start',
            'available_time_tuesday_end',
            'available_time_wednesday_start',
            'available_time_wednesday_end',
            'available_time_thursday_start',
            'available_time_thursday_end',
            'available_time_friday_start',
            'available_time_friday_end',
            'available_time_saturday_start',
            'available_time_saturday_end',
            'available_time_sunday_start',
            'available_time_sunday_end',
            'reason_text',
            'passion_text',
            'payment_method',
            'paypal_email',
            'account_image_1',
            'account_image_2',
            'fee_rate',
            'last_login_at',
            'created_at',
            'updated_at',
        ];
    }
}
