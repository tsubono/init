<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
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
     * お問い合わせ
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * お問い合わせ送信処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send()
    {
        return view('contact.send');
    }
}
