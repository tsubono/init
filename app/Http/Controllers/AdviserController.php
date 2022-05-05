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
            '〜19'. __('message.years old'),
            '20〜29'. __('message.years old'),
            '30〜39'. __('message.years old'),
            '40〜49'. __('message.years old'),
            '50〜59'. __('message.years old'),
            '60〜69'. __('message.years old'),
            '70〜79'. __('message.years old'),
            '80〜89'. __('message.years old'),
            '90〜99'. __('message.years old'),
            '100〜109'. __('message.years old'),
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
