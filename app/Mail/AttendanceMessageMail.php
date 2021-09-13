<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Attendance $attendance;
    protected string $userType;

    /**
     * AttendanceRequestMail constructor.
     * @param Attendance $attendance
     * @param string $userType
     */
    public function __construct(Attendance $attendance, string $userType = 'mate')
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
        return $this->view('emails.attendance-message')
            ->subject('【INIT】受講メッセージが届きました')
            ->with([
                'attendance' => $this->attendance,
                'userType' => $this->userType,
            ]);
    }
}
