<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Repositories\Information\InformationRepositoryInterface;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    private InformationRepositoryInterface $informationRepository;

    /**
     * InfoController constructor.
     * @param InformationRepositoryInterface $informationRepository
     */
    public function __construct(InformationRepositoryInterface $informationRepository)
    {
        $this->informationRepository = $informationRepository;
    }

    /**
     * お知らせ一覧
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $informations = $this->informationRepository->getPaginate();

        return view('infos.index', compact('informations'));
    }

    /**
     * お知らせ詳細
     *
     * @param Information $information
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Information $information)
    {
        return view('infos.show', compact('information'));
    }
}
