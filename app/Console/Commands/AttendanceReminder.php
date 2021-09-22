<?php

namespace App\Console\Commands;

use App\Mail\AttendanceReminderMail;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AttendanceReminder extends Command
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
    protected $description = 'Reminder to users about attendance';

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
        try {
            // configで設定されているリマインダー時間 (=○分前)
            $reminderMinute = config('const.reminder_minute');
            // リマインダー対象の日時を取得
            $remindDate = Carbon::now()->addMinutes($reminderMinute)->format('Y-m-d H:i');

            // 受講テーブルから受講日時で検索してリマインダー実行
            Attendance::query()
                ->where('status', Attendance::STATUS_APPROVAL)
                ->where('datetime', $remindDate. ':00')
                ->get()
                ->each(function (Attendance $attendance) {

                    Log::debug('リマインダー送信開始。受講ID: '. $attendance->id);

                    // 講師へリマインダーメール通知
                    Mail::to($attendance->adviserUser->email)->send(
                        new AttendanceReminderMail($attendance, 'adviser')
                    );

                    // メイトの場合は通知フラグがONの場合のみメール通知
                    if ($attendance->mateUser->is_notice) {
                        // メイトへリマインダーメール通知
                        Mail::to($attendance->mateUser->email)->send(
                            new AttendanceReminderMail($attendance)
                        );
                    }
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
