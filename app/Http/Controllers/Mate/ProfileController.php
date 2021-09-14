<?php

namespace App\Http\Controllers\Mate;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateUserBasicRequest;
use App\Http\Requests\MateUserLearnRequest;
use App\Http\Requests\MateUserNoticeRequest;
use App\Http\Requests\MateUserPasswordRequest;
use App\Repositories\MateUser\MateUserRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use App\Repositories\MstRoom\MstRoomRepositoryInterface;
use Illuminate\Support\Facades\Hash;

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
     * メイトプロフィール設定 (基本情報)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editBasic()
    {
        $user = auth()->guard('mate')->user();
        $mst_countries = $this->mstCountryRepository->all();

        return view('mate.profile.edit',
            compact('user', 'mst_countries'));
    }

    /**
     * メイトプロフィール更新処理 (基本情報)
     *
     * @param MateUserBasicRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBasic(MateUserBasicRequest $request)
    {
        $this->mateUserRepository->update(
            auth()->guard('mate')->user()->id,
            $request->all() + [
                'birthday' => "{$request->birthday_y}-{$request->birthday_m}-{$request->birthday_d}"
            ]
        );

        return redirect(route('mate.profile.edit'))->with('success_message', 'プロフィールを更新しました');
    }

    /**
     * メイトプロフィール設定 (学びたい設定)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editLearn()
    {
        $user = auth()->guard('mate')->user();
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('mate.profile.edit-learn',
            compact('user', 'mst_languages', 'mst_rooms'));
    }

    /**
     * メイトプロフィール更新処理 (学びたい設定)
     *
     * @param MateUserLearnRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateLearn(MateUserLearnRequest $request)
    {
        $this->mateUserRepository->update(
            auth()->guard('mate')->user()->id, $request->all()
        );

        return redirect(route('mate.profile.edit.learn'))->with('success_message', 'プロフィールを更新しました');
    }

    /**
     * メイトプロフィール設定 (パスワード)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editPassword()
    {
        $user = auth()->guard('mate')->user();

        return view('mate.profile.edit-password', compact('user'));
    }

    /**
     * メイトプロフィール更新処理 (パスワード)
     *
     * @param MateUserPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(MateUserPasswordRequest $request)
    {
        $this->mateUserRepository->update(
            auth()->guard('mate')->user()->id,
            [
                'password' => Hash::make($request->password)
            ]
        );

        return redirect(route('mate.profile.edit.password'))->with('success_message', 'プロフィールを更新しました');
    }

    /**
     * メイトプロフィール設定 (通知設定)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editNotice()
    {
        $user = auth()->guard('mate')->user();

        return view('mate.profile.edit-notice', compact('user'));
    }

    /**
     * メイトプロフィール更新処理 (通知設定)
     *
     * @param MateUserNoticeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateNotice(MateUserNoticeRequest $request)
    {
        $this->mateUserRepository->update(auth()->guard('mate')->user()->id, $request->all());

        return redirect(route('mate.profile.edit.notice'))->with('success_message', 'プロフィールを更新しました');
    }
}
