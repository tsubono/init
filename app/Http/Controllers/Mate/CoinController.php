<?php

namespace App\Http\Controllers\Mate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoinController extends Controller
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
     * コイン管理画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('mate.coins.index');
    }

    /**
     * コイン購入画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buy()
    {
        return view('mate.coins.buy');
    }
}
