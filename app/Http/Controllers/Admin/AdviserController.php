<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
     * アドバイザー一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.advisers.index');
    }

    /**
     * アドバイザー詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('admin.advisers.show');
    }

    /**
     * アドバイザー更新
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {
        // TODO
    }

    /**
     * アドバイザーCSVエクスポート
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exportCsv()
    {
        // TODO
    }
}
