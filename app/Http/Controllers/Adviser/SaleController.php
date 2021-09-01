<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
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
     * (アドバイザーマイページ) 売上一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adviser.sales.index');
    }

    /**
     * (アドバイザーマイページ) 振り込み申請
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function request()
    {
        // TODO
    }
}
