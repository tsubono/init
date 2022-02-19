<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceCloseMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Attendance $attendance;

    /**
     * AttendanceRequestMail constructor.
     * @param Attendance $attendance
     */
    public function __construct(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.attendance-close')
            ->subject('【INIT】'. __('message.Completion of attendance has arrived'))
            ->with([
                'attendance' => $this->attendance,
            ]);
    }
}
