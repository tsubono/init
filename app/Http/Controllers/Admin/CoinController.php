<?php

namespace App\Http\Controllers\Admin;

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
     * コイン一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.coins.index');
    }

    /**
     * コイン詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('admin.coins.show');
    }

    /**
     * コインCSVエクスポート
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exportCsv()
    {
        // TODO
    }
}
