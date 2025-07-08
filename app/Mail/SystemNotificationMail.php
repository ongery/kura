<?php

namespace App\Mail;

use App\Models\NotificationRow;
use App\Models\OKRI;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SystemNotificationMail extends Mailable
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

        $notification = $this->notification;
        $userData = $this->user;

        $notificationRow = NotificationRow::where('DocEntry', $notification->id)->first();

        $documentData = OKRI::with('objecttype')->where('id', $notificationRow->DocNum)
            ->where('ObjType', $notificationRow->ObjType)
            ->first();

        $mailSubject = $documentData->objecttype->DocumentName . " : Assignment Notification";

        return $this->subject($mailSubject)
            ->markdown('mail.ErrorNotification')
            ->with('documentData', $documentData)
            ->with('user', $userData);

    }
}
