<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransferRequest;
use App\Repositories\TransferRequest\TransferRequestRepositoryInterface;
use Illuminate\Http\Request;

class TransferRequestController extends Controller
{
    private TransferRequestRepositoryInterface $transferRequestRepository;

    /**
     * TransferRequestController constructor.
     * @param TransferRequestRepositoryInterface $transferRequestRepository
     */
    public function __construct(TransferRequestRepositoryInterface $transferRequestRepository)
    {
        $this->transferRequestRepository = $transferRequestRepository;
    }

    /**
     * 振り込み申請一覧
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transferRequests = $this->transferRequestRepository->getPaginate();

        return view('admin.transfer-requests.index', compact('transferRequests'));
    }

    /**
     * 振り込み申請ステータス更新
     *
     * @param TransferRequest $transferRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateStatus(TransferRequest $transferRequest)
    {
        $this->transferRequestRepository->update($transferRequest->id, [
            'status' => TransferRequest::STATUS_COMPLETE,
        ]);

        return redirect(route('admin.transfer-requests.index'))->with('success_message', __('message.Updated status'));
    }
}
