<?php

namespace App\Mail;

use App\Models\NotificationRow;
use App\Models\OKRI;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDailyTaskMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $notification)
    {

        $this->user = $user;
        $this->notification = $notification;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $allUrls = [
            "kriURL" => config('app.url') . "/MyKRIs",
            "kciURL" => config('app.url') . "/MyKCI",
            "kpiURL" => config('app.url') . "/MyISOKPIs",
            "kmisURL" => config('app.url') . "/MyAttestation",
        ];
        $notification = $this->notification;
        $userData = $this->user;

        $notificationRow = NotificationRow::where('DocEntry', $notification->id)->get();

        foreach ($notificationRow as $key => $row) {
            $row->document = OKRI::where('id', $row->DocNum)->first();
        }

        $allKRIs = $notificationRow->where('ObjType', 17)->take(10);

        $allKCIs = $notificationRow->where('ObjType', 20)->take(10);

        $allKPIs = $notificationRow->where('ObjType', 27)->take(10);
        $allKMIs = $notificationRow->where('ObjType', 28)->take(10);

        // $documentData = OKRI::with('objecttype')->where('id', $notificationRow->DocNum)
        //     ->where('ObjType', $notificationRow->ObjType)
        //     ->first();

        $mailSubject = "Daily Tasks";

        return $this->subject($mailSubject)
            ->markdown('mail.DailyTaskNotification')
            ->with('kris', $allKRIs)
            ->with('totalKris', $allKRIs->count())
            ->with('kcis', $allKCIs)
            ->with('totalKcis', $allKCIs->count())
            ->with('kpis', $allKPIs)
            ->with('totalKpis', $allKPIs->count())
            ->with('kmis', $allKMIs)
            ->with('totalKmis', $allKMIs->count())
            ->with('user', $userData)
            ->with('allURLS', $allUrls);

    }
}
