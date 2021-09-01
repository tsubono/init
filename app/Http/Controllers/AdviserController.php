<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdviserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 講師検索
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('advisers.index');
    }

    /**
     * 講師詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('advisers.show');
    }
}
