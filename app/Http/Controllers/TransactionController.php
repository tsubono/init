<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
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
     * 取引一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('transactions.index');
    }

    /**
     * 取引詳細
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('transactions.show');
    }

    /**
     * 取引ステータス更新
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateStatus()
    {
        // TODO
    }

    /**
     * 取引メッセージ
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function messages()
    {
        return view('adviser.transactions.show');
    }

    /**
     * 取引メッセージ送信
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
