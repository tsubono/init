<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private SettingRepositoryInterface $settingRepository;

    /**
     * SettingController constructor.
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * サイト設定
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = $this->settingRepository->getOne();

        return view('admin.setting.index', compact('setting'));
    }

    /**
     * サイト設定更新
     *
     * @param Setting $setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Setting $setting, Request $request)
    {
        $this->settingRepository->update($setting->id, $request->all());

        return redirect(route('admin.setting.index'))->with('success_message', __('message.Updated settings'));
    }
}
