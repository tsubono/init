<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Http\Request;

class LessonsSearchController extends Controller
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
        $lessonsPagination = $this->lessonRepository->getByConditionPaginate(
            10,
            $request->get('order'),
            $request->get('category'),
            $request->get('language'),
            $request->get('room'),
            $request->get('country'),
            $request->get('gender'),
            $request->get('coin-min'),
            $request->get('coin-max')
        );

        $responseData = [
            'lessons' => $lessonsPagination->items(),
            'total' => $lessonsPagination->total(),
        ];

        return response()->json($responseData);
    }
}
