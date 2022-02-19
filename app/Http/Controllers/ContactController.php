<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private ContactRepositoryInterface $contactRepository;

    /**
     * ContactController constructor.
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
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
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send(ContactRequest $request)
    {
        DB::beginTransaction();
        try {
            // DB登録
            $contact = $this->contactRepository->store($request->all());

            // お問い合わせ元へメール送信
            Mail::to($contact->email)->send(
                new ContactMail($contact)
            );
            // 管理者へメール送信
            Mail::to(config('mail.admin_email'))->send(
                new ContactMail($contact, true)
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }

        return redirect(route('contact.index'))->with('success_message', __('message.Your inquiry has been sent'));
    }
}
