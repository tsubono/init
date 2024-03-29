<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdviserUserBasicRequest;
use App\Http\Requests\AdviserUserPasswordRequest;
use App\Http\Requests\AdviserUserPersonalRequest;
use App\Http\Requests\AdviserUserTeachRequest;
use App\Mail\WithdrawalMail;
use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use App\Repositories\MstRoom\MstRoomRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;
    private MstCountryRepositoryInterface $mstCountryRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstRoomRepositoryInterface $mstRoomRepository;
    private LessonRepositoryInterface $lessonRepository;

    /**
     * ProfileController constructor.
     * @param AdviserUserRepositoryInterface $adviserUserRepository
     * @param MstCountryRepositoryInterface $mstCountryRepository
     * @param MstLanguageRepositoryInterface $mstLanguageRepository
     * @param MstRoomRepositoryInterface $mstRoomRepository
     * @param LessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        AdviserUserRepositoryInterface $adviserUserRepository,
        MstCountryRepositoryInterface $mstCountryRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstRoomRepositoryInterface $mstRoomRepository,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->adviserUserRepository = $adviserUserRepository;
        $this->mstCountryRepository = $mstCountryRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstRoomRepository = $mstRoomRepository;
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * 講師プロフィール設定 (基本情報)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editBasic()
    {
        $user = auth()->guard('adviser')->user();
        $mst_countries = $this->mstCountryRepository->all();

        return view('adviser.profile.edit', compact('user', 'mst_countries'));
    }

    /**
     * 講師プロフィール更新処理 (基本情報)
     *
     * @param AdviserUserBasicRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBasic(AdviserUserBasicRequest $request)
    {
        $this->adviserUserRepository->update(
            auth()->guard('adviser')->user()->id,
            $request->all() + [
                'birthday' => "{$request->birthday_y}-{$request->birthday_m}-{$request->birthday_d}"
            ]
        );

        return redirect(route('adviser.profile.edit'))->with('success_message', __('message.I updated my profile'));
    }

    /**
     * 講師プロフィール設定 (教える設定)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTeach()
    {
        $user = auth()->guard('adviser')->user();
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('adviser.profile.edit-teach',
            compact('user', 'mst_languages', 'mst_rooms'));
    }

    /**
     * 講師プロフィール更新処理 (教える設定)
     *
     * @param AdviserUserTeachRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTeach(AdviserUserTeachRequest $request)
    {
        $this->adviserUserRepository->update(
            auth()->guard('adviser')->user()->id, $request->all()
        );

        return redirect(route('adviser.profile.edit.teach'))->with('success_message', __('message.I updated my profile'));
    }

    /**
     * 講師プロフィール設定 (パスワード)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editPassword()
    {
        $user = auth()->guard('adviser')->user();

        return view('adviser.profile.edit-password', compact('user'));
    }

    /**
     * 講師プロフィール更新処理 (パスワード)
     *
     * @param AdviserUserPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(AdviserUserPasswordRequest $request)
    {
        $this->adviserUserRepository->update(
            auth()->guard('adviser')->user()->id,
            [
                'password' => Hash::make($request->password)
            ]
        );

        return redirect(route('adviser.profile.edit.password'))->with('success_message', __('message.I updated my profile'));
    }


    /**
     * 講師プロフィール設定 (個人情報)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editPersonal()
    {
        $user = auth()->guard('adviser')->user();

        return view('adviser.profile.edit-personal', compact('user'));
    }

    /**
     * 講師プロフィール更新処理 (個人情報)
     *
     * @param AdviserUserPersonalRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePersonal(AdviserUserPersonalRequest $request)
    {
        $this->adviserUserRepository->update(
            auth()->guard('adviser')->user()->id, $request->all()
        );

        return redirect(route('adviser.profile.edit.personal'))->with('success_message', __('message.I updated my profile'));
    }

    /**
     * 講師ユーザー退会
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function withdrawal()
    {
        $user = auth()->guard('adviser')->user();
        // DBからユーザー削除
        $this->adviserUserRepository->destroy($user->id);
        // 紐づくレッスンたちを非公開にする
        $this->lessonRepository->stopByAdviserUserId($user->id);

        // 講師ユーザーへ退会完了通知
        Mail::to($user->email)->send(
            new WithdrawalMail($user)
        );

        return redirect(route('withdrawal'));
    }
}
