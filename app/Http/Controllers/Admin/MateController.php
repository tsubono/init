<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateController extends Controller
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
     * メイト一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.mates.index');
    }

    /**
     * メイト詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('admin.mates.show');
    }

    /**
     * メイト更新
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {
        // TODO
    }

    /**
     * メイトCSVエクスポート
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exportCsv()
    {
        // TODO
    }
}
