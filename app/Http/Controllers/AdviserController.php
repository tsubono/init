<?php

namespace App\Http\Controllers;

use App\Models\AdviserUser;
use App\Repositories\AdviserUser\AdviserUserRepositoryInterface;
use App\Repositories\MstCategory\MstCategoryRepositoryInterface;
use App\Repositories\MstCountry\MstCountryRepositoryInterface;
use App\Repositories\MstLanguage\MstLanguageRepositoryInterface;
use Illuminate\Http\Request;

class AdviserController extends Controller
{
    private AdviserUserRepositoryInterface $adviserUserRepository;
    private MstCategoryRepositoryInterface $mstCategoryRepository;
    private MstLanguageRepositoryInterface $mstLanguageRepository;
    private MstCountryRepositoryInterface $mstCountryRepository;

    /**
     * AdviserController constructor.
     * @param  AdviserUserRepositoryInterface  $adviserUserRepository
     * @param  MstCategoryRepositoryInterface  $mstCategoryRepository
     * @param  MstLanguageRepositoryInterface  $mstLanguageRepository
     * @param  MstCountryRepositoryInterface  $mstCountryRepository
     */
    public function __construct(
        AdviserUserRepositoryInterface $adviserUserRepository,
        MstCategoryRepositoryInterface $mstCategoryRepository,
        MstLanguageRepositoryInterface $mstLanguageRepository,
        MstCountryRepositoryInterface $mstCountryRepository
    ) {
        $this->adviserUserRepository = $adviserUserRepository;
        $this->mstCategoryRepository = $mstCategoryRepository;
        $this->mstLanguageRepository = $mstLanguageRepository;
        $this->mstCountryRepository = $mstCountryRepository;
    }

    /**
     * 講師検索
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = $this->mstCategoryRepository->all();
        $languages = $this->mstLanguageRepository->all();
        $countries = $this->mstCountryRepository->all();
        $ages = collect([
            '〜19歳',
            '20〜29歳',
            '30〜39歳',
            '40〜49歳',
            '50〜59歳',
            '60〜69歳',
            '70〜79歳',
            '80〜89歳',
            '90〜99歳',
            '100〜109歳',
        ]);

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

        $advisers = collect($advisersPagination->items());
        $total = $advisersPagination->total();

        return view('advisers.index', compact('ages', 'categories', 'languages', 'countries', 'advisers', 'total'));
    }

    /**
     * 講師詳細
     *
     * @param  AdviserUser  $adviserUser
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(AdviserUser $adviserUser)
    {
        return view('advisers.show', compact('adviserUser'));
    }
}
