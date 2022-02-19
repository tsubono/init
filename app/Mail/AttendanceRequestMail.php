<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceRequestMail extends Mailable
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
        return $this->view('emails.attendance-request')
            ->subject('【INIT】'. __('message.The application for attendance has arrived'))
            ->with([
                'attendance' => $this->attendance,
            ]);
    }
}
