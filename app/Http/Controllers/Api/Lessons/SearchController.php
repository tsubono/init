<?php

namespace App\Http\Controllers\Api\Lessons;

use App\Http\Controllers\Controller;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private LessonRepositoryInterface $lessonRepository;

    /**
     * @param  LessonRepositoryInterface  $lessonRepository
     */
    public function __construct(LessonRepositoryInterface $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * レッスン検索
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $lessons = $this->lessonRepository->getByConditionPaginate(
            10,
            $request->get('category'),
            $request->get('language'),
            $request->get('room'),
            $request->get('country'),
            $request->get('gender'),
            $request->get('coin-min'),
            $request->get('coin-max')
        );

        return response()->json($lessons->items());
    }
}
