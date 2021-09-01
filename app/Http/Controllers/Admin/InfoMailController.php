<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoMailController extends Controller
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
     * お知らせ配信一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.info-mails.index');
    }

    /**
     * お知らせ配信登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.info-mails.create');
    }

    /**
     * お知らせ配信登録処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        // TODO
    }

    /**
     * お知らせ配信編集フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('admin.info-mails.edit');
    }

    /**
     * お知らせ配信更新処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {
        // TODO
    }

    /**
     * お知らせ配信削除処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy()
    {
        // TODO
    }
}
