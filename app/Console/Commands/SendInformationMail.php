<?php

namespace App\Console\Commands;

use App\Mail\AttendanceReminderMail;
use App\Models\AdviserUser;
use App\Models\Attendance;
use App\Models\InformationMail;
use App\Models\MateUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendInformationMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:information-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send information email to users from admin';

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
            InformationMail::query()
                ->whereDate('date', now())
                ->where('is_sent', false)
                ->get()
                ->each(function (InformationMail $informationMail) {
                    Log::debug('お知らせ配信開始。お知らせ配信ID: '. $informationMail->id);

                    // 全員に通知
                    if ($informationMail->type === InformationMail::TYPE_ALL) {
                        AdviserUser::all()->each(function(AdviserUser $adviserUser) use ($informationMail) {
                            Mail::to($adviserUser->email)->send(
                                new \App\Mail\InformationMail($informationMail)
                            );
                        });
                        MateUser::all()->each(function(MateUser $mateUser) use ($informationMail) {
                            Mail::to($mateUser->email)->send(
                                new \App\Mail\InformationMail($informationMail)
                            );
                        });
                    // 通知ONのユーザーのみ
                    } elseif ($informationMail->type === InformationMail::TYPE_ONLY_IS_NOTICE) {
                        AdviserUser::all()->each(function(AdviserUser $adviserUser) use ($informationMail) {
                            Mail::to($adviserUser->email)->send(
                                new \App\Mail\InformationMail($informationMail)
                            );
                        });
                        MateUser::query()->where('is_notice', 1)
                            ->get()
                            ->each(function(MateUser $mateUser) use ($informationMail) {
                                Mail::to($mateUser->email)->send(
                                    new \App\Mail\InformationMail($informationMail)
                                );
                        });
                    }

                    $informationMail->update([
                        'is_sent' => true,
                    ]);
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
