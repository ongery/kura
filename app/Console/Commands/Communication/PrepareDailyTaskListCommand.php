<?php

namespace App\Console\Commands\Communication;

use App\Models\Notification;
use App\Models\NotificationRow;
use App\Models\OKRI;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrepareDailyTaskListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-task-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Task List:Daily Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::beginTransaction();
        try {
            $allObjTypes = [17, 20, 27, 28];

            $users = User::get();

            foreach ($users as $key => $user) {

                $allTasks = OKRI::with('objecttype')->with('kri1')->whereIn('ObjType', $allObjTypes)
                    ->whereHas('kri1', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })
                    ->get();

                $header = Notification::firstOrCreate([
                    'user_id' => $user->id,
                    'Subject' => "Daily Tasks",
                    'type' => 1,
                ]);

                foreach ($allTasks as $key => $documentData) {
                    NotificationRow::updateOrCreate([
                        'ObjType' => $documentData->ObjType,
                        'user_id' => $user->id,
                        "DocEntry" => $header->id,
                        "DocNum" => $documentData->id,
                    ], [

                        'Description' => "Task Pending",
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable$th) {
            DB::rollback();
            Log::info($th);
            //throw $th;
        }

    }
}
