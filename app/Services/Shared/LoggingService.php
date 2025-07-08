<?php

namespace App\Services\Shared;

use Spatie\Activitylog\Models\Activity;

class LoggingService
{

    public function saveLog($description, $LogCategory, $properties, $InergeyRefrence)
    {

        $activity = activity()
            ->tap(function (Activity $activity) use ($LogCategory, $properties, $InergeyRefrence) {
                $activity->LogCategory = $LogCategory;
                $activity->properties = $properties;
                $activity->InergeyRefrence = $InergeyRefrence;
            })
            ->log($description);

        return $activity->id;

    }

    public function updateLogStatus($LogID, $Status, $description, $SAPRefrence)
    {

        $update = Activity::where('id', $LogID)->update([
            'Status' => $Status,
            'status_description' => $description,
            'SAPRefrence' => $SAPRefrence,
        ]);

    }

    public function updateLogRef($LogID, $SAPRefrence)
    {
        $update = Activity::where('id', $LogID)->update([
            'SAPRefrence' => $SAPRefrence,
        ]);

    }

    public function updateCloseLog($LogID, $Status, $description)
    {
        $update = Activity::where('id', $LogID)->update([
            'Status' => $Status,
            'status_description' => $description,
        ]);

    }

}
