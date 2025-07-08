<?php

namespace App\Helpers;

use App\Models\historyLogs;
use Illuminate\Support\Facades\Auth;

class CustomHelper 
{
    public static function userHistoryLogs ($action, $logs)
    {
        $user = Auth::user();
        $action = $action;
        $log = $logs;

        return historyLogs::create([
            'user_id'   =>  $user->id,
            'action'    =>  $action,
            'logs'      =>  $user->Fname.' '.$log
        ]);
    }

    
}
