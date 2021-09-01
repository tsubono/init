<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
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
     * お知らせ一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.infos.index');
    }

    /**
     * お知らせ登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.infos.create');
    }

    /**
     * お知らせ登録処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        // TODO
    }

    /**
     * お知らせ編集フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('admin.infos.edit');
    }

    /**
     * お知らせ更新処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {
        // TODO
    }

    /**
     * お知らせ削除処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy()
    {
        // TODO
    }
}
