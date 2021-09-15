<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * WithdrawalMail constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.withdrawal')
            ->subject('【INIT】退会処理が完了しました')
            ->with([
                'user' => $this->user,
            ]);
    }
}
