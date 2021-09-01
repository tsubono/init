<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
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
     * (アドバイザーマイページ) レッスン一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adviser.lessons.index');
    }

    /**
     * (アドバイザーマイページ) レッスン登録フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('adviser.lessons.create');
    }

    /**
     * (アドバイザーマイページ) レッスン登録処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        // TODO
    }

    /**
     * (アドバイザーマイページ) レッスン編集フォーム
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('adviser.lessons.edit');
    }

    /**
     * (アドバイザーマイページ) レッスン更新処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update()
    {
        // TODO
    }

    /**
     * (アドバイザーマイページ) レッスン削除処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy()
    {
        // TODO
    }
}
