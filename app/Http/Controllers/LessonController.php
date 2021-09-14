<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\MstCategory\MstCategoryRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private LessonRepositoryInterface $lessonRepository;
    private MstCategoryRepositoryInterface $mstCategoryRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstCountryRepositoryInterface $mstCountryRepository;

    /**
     * LessonController constructor.
     * @param  LessonRepositoryInterface  $lessonRepository
     * @param  \App\Repositories\MstCategory\MstCategoryRepositoryInterface  $mstCategoryRepository
     * @param  \App\Repositories\MstLanguage\MstLanguageRepositoryInterface  $mstLanguageRepository
     * @param  \App\Repositories\MstCountry\MstCountryRepositoryInterface  $mstCountryRepository
     */
    public function __construct(
        LessonRepositoryInterface $lessonRepository,
        MstCategoryRepositoryInterface $mstCategoryRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstCountryRepositoryInterface $mstCountryRepository
    ) {
        $this->lessonRepository = $lessonRepository;
        $this->mstCategoryRepository = $mstCategoryRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstCountryRepository = $mstCountryRepository;
    }

    /**
     * レッスン検索
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = $this->mstCategoryRepository->all();
        $languages = $this->mstLanguageRepository->all();
        $countries = $this->mstCountryRepository->all();

        // TODO: 検索: Repositoryに検索用のメソッド (ex: getByCondition($searchParam) など) を作成して呼び出す
        $lessons = $this->lessonRepository->getPaginate();

        return view('lessons.index', compact('categories', 'languages', 'countries', 'lessons'));
    }

    /**
     * レッスン詳細
     *
     * @param  Lesson  $lesson
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Lesson $lesson)
    {
        if ($lesson->is_stop) {
            abort(404);
        }
        return view('lessons.show', compact('lesson'));
    }
}
