<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $attendance;
    protected string $userType;

    /**
     * AttendanceRequestMail constructor.
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
            ->subject('【INIT】受講リマインダー通知')
            ->with([
                'attendance' => $this->attendance,
                'userType' => $this->userType,
            ]);
    }
}
