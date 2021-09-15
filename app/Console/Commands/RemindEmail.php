<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemindEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $remindDate = Carbon::now()->addMinutes(config('const.reminder_minute'))->format('Y-m-d H:i');

        $attendances = Attendance::where('status', Attendance::STATUS_APPROVAL)
                        ->where('datetime', $remindDate)
                        ->get();

        $attendances->each(function (Attendance $attendance) {
            // アドバイザーへ受講申請メール通知
            Mail::to($attendance->adviserUser->email)->send(
                new AttendanceRequestMail($attendance)
            );

            // メイトへ受講完了メール通知
            Mail::to($attendance->mateUser->email)->send(
                new AttendanceCloseMail($attendance)
            );

        })
    }
}
