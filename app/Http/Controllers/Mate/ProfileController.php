<?php

namespace App\Http\Controllers\Mate;

use App\Http\Controllers\Controller;
use App\Repositories\MateUser\MateUserRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use App\Repositories\MstRoom\MstRoomRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private MateUserRepositoryInterface $mateUserRepository;
    private MstCountryRepositoryInterface $mstCountryRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstRoomRepositoryInterface $mstRoomRepository;

    /**
     * ProfileController constructor.
     * @param MateUserRepositoryInterface $mateUserRepository
     * @param MstCountryRepositoryInterface $mstCountryRepository
     * @param MstLanguageRepositoryInterface $mstLanguageRepository
     * @param MstRoomRepositoryInterface $mstRoomRepository
     */
    public function __construct(
        MateUserRepositoryInterface $mateUserRepository,
        MstCountryRepositoryInterface $mstCountryRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstRoomRepositoryInterface $mstRoomRepository
    ) {
        $this->mateUserRepository = $mateUserRepository;
        $this->mstCountryRepository = $mstCountryRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstRoomRepository = $mstRoomRepository;
    }

    /**
     * メイトプロフィール設定
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = auth()->guard('mate')->user();
        $mst_countries = $this->mstCountryRepository->all();
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('mate.profile.edit',
            compact('user', 'mst_countries', 'mst_languages', 'mst_rooms'));
    }

    /**
     * メイトプロフィール更新処理
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $this->mateUserRepository->update(auth()->guard('mate')->user()->id, $request->all());

        return redirect(route('mate.profile.edit'))->with('success-message', 'プロフィールを更新しました');
    }
}
