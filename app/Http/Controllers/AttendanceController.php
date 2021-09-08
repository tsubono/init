<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
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
     * 受講一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('attendances.index');
    }

    /**
     * 受講詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('attendances.show');
    }

    /**
     * 受講申請承認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approval()
    {
        // TODO
    }

    /**
     * 受講申請否認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reject()
    {
        // TODO
    }

    /**
     * 受講メッセージ
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function messages()
    {
        return view('adviser.attendances.show');
    }

    /**
     * 受講メッセージ送信
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMessage()
    {
        // TODO
    }

    /**
     * レビュー送信
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function review()
    {
        // TODO
    }

    /**
     * キャンセル
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cancel()
    {
        // TODO
    }

    /**
     * 通報
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
    {
        // TODO
    }
}
