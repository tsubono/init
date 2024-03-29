<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $attendance;
    protected $userType;

    /**
     * AttendanceReminderMail constructor.
     * @param $attendance
     * @param $userType
     */
    public function __construct($attendance, $userType = 'mate')
    {
        $this->attendance = $attendance;
        $this->userType = $userType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reminder-attendance')
            ->subject('【INIT】'. __('message.Attendance reminder notification'))
            ->with([
                'attendance' => $this->attendance,
                'userType' => $this->userType,
            ]);
    }
}
