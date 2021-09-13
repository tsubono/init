<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Contact $contact;
    protected bool $isAdmin;

    /**
     * ContactMail constructor.
     * @param Contact $contact
     * @param bool $isAdmin
     */
    public function __construct(Contact $contact, bool $isAdmin = false)
    {
        $this->contact = $contact;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
            ->subject($this->isAdmin ? '【INIT】お問い合わせが届きました' : '【INIT】お問い合わせを受け付けました')
            ->with([
                'contact' => $this->contact,
                'isAdmin' => $this->isAdmin,
            ]);
    }
}
