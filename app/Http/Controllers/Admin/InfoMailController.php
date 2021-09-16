<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationMailRequest;
use App\Models\InformationMail;
use App\Repositories\InformationMail\InformationMailRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InfoMailController extends Controller
{
    private InformationMailRepositoryInterface $informationMailRepository;

    /**
     * InfoMailController constructor.
     * @param InformationMailRepositoryInterface $informationMailRepository
     */
    public function __construct(InformationMailRepositoryInterface $informationMailRepository)
    {
        $this->informationMailRepository = $informationMailRepository;
    }

    /**
     * お知らせ配信一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $infoMails = $this->informationMailRepository->getPaginate();

        return view('admin.info-mails.index', compact('infoMails'));
    }

    /**
     * お知らせ配信登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $infoMail = new InformationMail();

        return view('admin.info-mails.create', compact('infoMail'));
    }

    /**
     * お知らせ配信登録処理
     *
     * @param InformationMailRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(InformationMailRequest $request)
    {
        DB::beginTransaction();
        try {
            // お知らせ配信テーブルへ登録
            $this->informationMailRepository->store($request->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.info-mails.index'))->with('success_message', 'お知らせ配信を登録しました');
    }

    /**
     * お知らせ配信編集フォーム
     *
     * @param InformationMail $infoMail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(InformationMail $infoMail)
    {
        return view('admin.info-mails.edit', compact('infoMail'));
    }

    /**
     * お知らせ配信更新処理
     *
     * @param InformationMailRequest $request
     * @param InformationMail $infoMail
     * \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(InformationMailRequest $request, InformationMail $infoMail)
    {
        DB::beginTransaction();
        try {
            // お知らせ配信テーブル更新
            $this->informationMailRepository->update($infoMail->id, $request->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.info-mails.index'))->with('success_message', 'お知らせ配信を更新しました');
    }

    /**
     * お知らせ配信削除処理
     *
     * @param InformationMail $infoMail
     * \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(InformationMail $infoMail)
    {
        DB::beginTransaction();
        try {
            // お知らせ配信テーブル削除
            $this->informationMailRepository->destroy($infoMail->id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.info-mails.index'))->with('success_message', 'お知らせ配信を削除しました');
    }
}
