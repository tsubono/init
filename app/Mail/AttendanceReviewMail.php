<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceReviewMail extends Mailable
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
        return $this->view('emails.attendance-review')
            ->subject('【INIT】'. __('message.Attendance review has arrived.'))
            ->with([
                'attendance' => $this->attendance,
                'userType' => $this->userType,
            ]);
    }
}
