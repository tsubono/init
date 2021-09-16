<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $informationMail;

    /**
     * InformationMail constructor.
     * @param $informationMail
     */
    public function __construct($informationMail)
    {
        $this->informationMail = $informationMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.information-mail')
            ->subject("【INIT】{$this->informationMail->title}")
            ->with([
                'informationMail' => $this->informationMail,
            ]);
    }
}
