<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Repositories\AdviserUser\AdviserUserRepository;
use Illuminate\Http\Request;

class AdvisersSearchController extends Controller
{
    private AdviserUserRepository $adviserUserRepository;

    /**
     * @param AdviserUserRepository $adviserUserReopsitory
     */
    public function __construct(AdviserUserRepository $adviserUserRepository)
    {
        $this->adviserUserRepository = $adviserUserRepository;
    }

    public function index(Request $request)
    {
        $advisersPagination = $this->adviserUserRepository->getByConditionPaginate(
            10,
            $request->get('order'),
            $request->get('category'),
            $request->get('language'),
            $request->get('name'),
            $request->get('country'),
            $request->get('residence-country'),
            $request->get('age'),
            $request->get('gender')
        );

        $responseData = [
            'advisers' => $advisersPagination->items(),
            'total' => $advisersPagination->total(),
        ];

        return response()->json($responseData);
    }
}
