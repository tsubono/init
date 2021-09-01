<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferRequestController extends Controller
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
     * 振り込み申請一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.transfer-requests.index');
    }

    /**
     * 振り込み申請ステータス更新
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateStatus()
    {
        // TODO
    }
}
