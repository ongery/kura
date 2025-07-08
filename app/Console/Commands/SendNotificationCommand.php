<?php

namespace App\Console\Commands;

use App\Mail\SendDailyTaskMail;
use App\Mail\SystemNotificationMail;
use App\Models\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::beginTransaction();
        try {
            $notifications = Notification::where('isSend', 0)->get();
            foreach ($notifications as $key => $notification) {

                if ($notification->type == 0) {
                    Mail::to($notification->user->email)->send(new SystemNotificationMail($notification->user, $notification));

                }

                if ($notification->type == 1) {
                    Mail::to($notification->user->email)
                        ->send(new SendDailyTaskMail($notification->user, $notification));

                }

                $notification->update([
                    'isSend' => 1,
                ]);
            }

            DB::commit();
        } catch (\Throwable$th) {
            Log::info($th);
            DB::rollback();
            dd($th);
        }

    }
}
