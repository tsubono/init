<?php

namespace App\Http\Controllers;

use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Http\Request;

class TopController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;
    private LessonRepositoryInterface $lessonRepository;

    /**
     * TopController constructor.
     * @param AdviserUserRepositoryInterface $adviserUserRepository
     * @param LessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        AdviserUserRepositoryInterface $adviserUserRepository,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->adviserUserRepository = $adviserUserRepository;
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * Top画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adviserUsers = $this->adviserUserRepository->getPaginate(3, 'updated_at');
        $lessons = $this->lessonRepository->getPaginate(4);

        return view('top', compact('adviserUsers', 'lessons'));
    }
}
