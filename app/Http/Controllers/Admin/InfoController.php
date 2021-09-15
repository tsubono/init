<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Models\AdviserUser;
use App\Models\Information;
use App\Models\MateUser;
use App\Notifications\InformationNotification;
use App\Repositories\Information\InformationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class InfoController extends Controller
{
    private InformationRepositoryInterface $informationRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InformationRepositoryInterface $informationRepository)
    {
        $this->informationRepository = $informationRepository;
    }

    /**
     * お知らせ一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $infos = $this->informationRepository->getPaginate();

        return view('admin.infos.index', compact('infos'));
    }

    /**
     * お知らせ登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $info = new Information();

        return view('admin.infos.create', compact('info'));
    }

    /**
     * お知らせ登録処理
     *
     * @param InformationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(InformationRequest $request)
    {
        DB::beginTransaction();
        try {
            // お知らせテーブルへ登録
            $information = $this->informationRepository->store($request->all());

            // お知らせ内容を通知登録
            Notification::send(AdviserUser::all(), new InformationNotification($information));
            Notification::send(MateUser::all(), new InformationNotification($information));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.infos.index'))->with('success_message', 'お知らせを登録しました');
    }

    /**
     * お知らせ編集フォーム
     *
     * @param Information $information
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Information $info)
    {
        return view('admin.infos.edit', compact('info'));
    }

    /**
     * お知らせ更新処理
     *
     * @param InformationRequest $request
     * @param Information $info
     * \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(InformationRequest $request, Information $info)
    {
        DB::beginTransaction();
        try {
            // お知らせテーブル更新
            $information = $this->informationRepository->update($info->id, $request->all());

            // 既存お知らせ通知を削除
            \App\Models\Notification::where('data->information_id', $info->id)->delete();
            // お知らせ内容を通知登録
            Notification::send(AdviserUser::all(), new InformationNotification($information));
            Notification::send(MateUser::all(), new InformationNotification($information));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.infos.index'))->with('success_message', 'お知らせを更新しました');
    }

    /**
     * お知らせ削除処理
     *
     * @param Request $request
     * @param Information $info
     * \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Information $info)
    {
        DB::beginTransaction();
        try {
            // お知らせテーブル削除
            $this->informationRepository->destroy($info->id);
            // お知らせ通知削除
            \App\Models\Notification::where('data->information_id', $info->id)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('admin.infos.index'))->with('success_message', 'お知らせを削除しました');
    }
}
