<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use App\Repositories\MstRoom\MstRoomRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private LessonRepositoryInterface $lessonRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstRoomRepositoryInterface $mstRoomRepository;

    /**
     * LessonController constructor.
     * @param LessonRepositoryInterface $lessonRepository
     * @param MstLanguageRepositoryInterface $mstLanguageRepository
     * @param MstRoomRepositoryInterface $mstRoomRepository
     */
    public function __construct(
        LessonRepositoryInterface $lessonRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstRoomRepositoryInterface $mstRoomRepository
    ) {
        $this->lessonRepository = $lessonRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstRoomRepository = $mstRoomRepository;
    }

    /**
     * (講師マイページ) レッスン一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->guard('adviser')->user();
        $lessons = $this->lessonRepository->getByAdviserIdPaginate($user->id);

        return view('adviser.lessons.index', compact('lessons'));
    }

    /**
     * (講師マイページ) レッスン登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $lesson = new Lesson();
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('adviser.lessons.create',
            compact('lesson', 'mst_languages', 'mst_rooms'));
    }

    /**
     *  (講師マイページ) レッスン登録処理
     *
     * @param LessonRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(LessonRequest $request)
    {
        $adviserUser = auth()->guard('adviser')->user();
        $this->lessonRepository->store($request->all() + ['adviser_user_id' => $adviserUser->id]);

        return redirect(route('adviser.lessons.index'))->with('success_message', __('message.I registered the lesson information'));
    }

    /**
     * (講師マイページ) レッスン編集フォーム
     *
     * @param Lesson $lesson
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Lesson $lesson)
    {
        $mst_languages = $this->mstLanguageRepository->all();
        $mst_rooms = $this->mstRoomRepository->all();

        return view('adviser.lessons.edit',
            compact('lesson', 'mst_languages', 'mst_rooms'));
    }

    /**
     *  (講師マイページ) レッスン更新処理
     *
     * @param Lesson $lesson
     * @param LessonRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Lesson $lesson, LessonRequest $request)
    {
        $this->lessonRepository->update($lesson->id, $request->all());

        return redirect(route('adviser.lessons.index'))->with('success_message', __('message.Updated lesson information'));
    }

    /**
     * (講師マイページ) レッスン削除処理
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Lesson $lesson)
    {
        $this->lessonRepository->destroy($lesson->id);

        return redirect(route('adviser.lessons.index'))->with('success_message', __('message.Deleted lesson information'));
    }
}
