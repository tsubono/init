<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceReportMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Attendance $attendance;
    protected string $userType;

    /**
     * AttendanceRequestMail constructor.
     * @param Attendance $attendance
     * @param string $userType
     */
    public function __construct(Attendance $attendance, string $userType)
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
        return $this->view('emails.attendance-report')
            ->subject('【INIT】'. __('message.Report to attendance has arrived'))
            ->with([
                'attendance' => $this->attendance,
                'userType' => $this->userType,
            ]);
    }
}
