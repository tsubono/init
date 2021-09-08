<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use App\Repositories\MstRoom\MstRoomRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;
    private MstCountryRepositoryInterface $mstCountryRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstRoomRepositoryInterface $mstRoomRepository;

    /**
     * ProfileController constructor.
     * @param AdviserUserRepositoryInterface $adviserUserRepository
     * @param MstCountryRepositoryInterface $mstCountryRepository
     * @param MstLanguageRepositoryInterface $mstLanguageRepository
     * @param MstRoomRepositoryInterface $mstRoomRepository
     */
    public function __construct(
        AdviserUserRepositoryInterface $adviserUserRepository,
        MstCountryRepositoryInterface $mstCountryRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstRoomRepositoryInterface $mstRoomRepository
    ) {
        $this->adviserUserRepository = $adviserUserRepository;
        $this->mstCountryRepository = $mstCountryRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstRoomRepository = $mstRoomRepository;
    }

    /**
     * アドバイザープロフィール設定
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = auth()->guard('adviser')->user();
        $mst_countries = $this->mstCountryRepository->all();
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('adviser.profile.edit',
            compact('user', 'mst_countries', 'mst_languages', 'mst_rooms'));
    }

    /**
     * アドバイザープロフィール更新処理
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $this->adviserUserRepository->update(
            auth()->guard('adviser')->user()->id,
            $request->all() + ['can_open_lesson' => true] // 必須事項入力済みなのでレッスン公開フラグをONにする
        );

        return redirect(route('adviser.profile.edit'))->with('success-message', 'プロフィールを更新しました');
    }
}
