<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private LessonRepositoryInterface $lessonRepository;

    /**
     * LessonController constructor.
     * @param LessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * レッスン検索
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // TODO: 検索: Repositoryに検索用のメソッド (ex: getByCondition($searchParam) など) を作成して呼び出す
        $lessons = $this->lessonRepository->getPaginate();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * レッスン詳細
     *
     * @param Lesson $lesson
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }
}
