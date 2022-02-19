<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\TransferRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransferRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected TransferRequest $transferRequest;

    /**
     * TransferRequestMail constructor.
     * @param TransferRequest $transferRequest
     */
    public function __construct(TransferRequest $transferRequest)
    {
        $this->transferRequest = $transferRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transfer-request')
            ->subject('【INIT】振り込み申請が届きました')
            ->with([
                'transferRequest' => $this->transferRequest,
            ]);
    }
}
