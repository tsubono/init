<?php

namespace App\Http\Controllers;

use App\Models\AdviserUser;
use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use Illuminate\Http\Request;

class AdviserController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;

    /**
     * AdviserController constructor.
     * @param AdviserUserRepositoryInterface $adviserUserRepository
     */
    public function __construct(
        AdviserUserRepositoryInterface $adviserUserRepository
    ) {
        $this->adviserUserRepository = $adviserUserRepository;
    }

    /**
     * アドバイザー検索
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // TODO: 検索: Repositoryに検索用のメソッド (ex: getByCondition($searchParam) など) を作成して呼び出す
        $advisers = $this->adviserUserRepository->getPaginate();

        return view('advisers.index', compact('advisers'));
    }

    /**
     * 講師詳細
     *
     * @param AdviserUser $adviserUser
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(AdviserUser $adviserUser)
    {
        return view('advisers.show', compact('adviserUser'));
    }
}
