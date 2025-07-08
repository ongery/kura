<?php

namespace App\Listeners;

use App\Events\KCIORKRIAddedEvent;
use App\Models\APDI;
use App\Models\KRI1;
use App\Models\Notification;
use App\Models\NotificationRow;

class KCIORKRINotificationListener
{

    public $afterCommit = true;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\KCIORKRIAddedEvent  $event
     * @return void
     */
    public function handle(KCIORKRIAddedEvent $event)
    {

        $documentData = $event->document;

        $apdi = APDI::where('ObjType', $documentData->ObjType)->first();

        $kri1s = KRI1::with('user')->where('o_k_r_i_id', $documentData->id)->get();

        foreach ($kri1s as $key => $kri1) {

            $header = Notification::create([
                'user_id' => $kri1->user_id,
            ]);

            NotificationRow::create([
                'ObjType' => $documentData->ObjType,
                'user_id' => $kri1->user_id,
                "DocEntry" => $header->id,
                "DocNum" => $documentData->id,
                'Description' => $apdi->DocumentName . " :Assignment",
            ]);

        }

    }
}
