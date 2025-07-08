<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\ORISK;
use App\Models\RISK4;
use App\Models\RISK5;
use Illuminate\Http\Request;
use App\Models\ActionTracking;
use App\Models\ActionMilestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Shared\DocumentsService;
use App\Services\Shared\ApiResponseService;

class ActionTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CRM_ACTIVITY_OBJTYPE = 42;

        try {
            $RiskID = \Request::get('RiskID');
            $o_k_r_i_id = \Request::get('o_k_r_i_id');

            $data = ActionTracking::with('supervisor', 'users', 'milestone')->latest()
                ->whereHas('users', function ($q) {
                    $user = Auth::user();
                    $q->where('user_id', $user->id);
                })
                ->when($o_k_r_i_id, function ($q) use ($o_k_r_i_id) {
                    $q->where('o_k_r_i_id', $o_k_r_i_id);
                })
                ->where('ObjType', '!=', $CRM_ACTIVITY_OBJTYPE)
                ->paginate(100);

            if ($data->isNotEmpty()) {
                foreach ($data->items() as $dt) {
                    $milestoneArr = $dt->milestone->where('status', 5)->all();
                    $actionPercent = 0;

                    if ($dt->milestone->isNotEmpty()) {
                        $actionPercent = (count($milestoneArr) / $dt->milestone->count() * 100);
                    }

                    $dt->action_percent = number_format($actionPercent, 2, '.', '');
                }
            }

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    $this->validate($request, [
        'Name' => 'required|string',
        'DueDate' => 'required',
        'ObjType' => 'required|numeric',
        'Status' => 'required_if:ObjType,!=,19',
        'parent_id' => 'required_if:ObjType,42',
        'user_id' => 'required_if:ObjType,!=,42',
        'Description' => 'required_if:ObjType,!=,42',
        'Category' => 'required_if:ObjType,!=,42',
        'o_i_t_m_id' => 'required_if:ObjType,41',
    ]);

    $user = Auth::user();
    DB::beginTransaction();
    try {
        $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
        $treatment = ActionTracking::create([
            "DocNum" => $DocNum,
            'o_r_i_s_k_id' => $request['RiskID'],
            'o_k_r_i_id' => $request['o_k_r_i_id'],
            'o_i_t_m_id' => $request['o_i_t_m_id'],
            'parent_id' => $request['parent_id'],
            "ObjType" => $request['ObjType'],
            "Source" => $request['Source'],
            "Category" => $request['Category'],
            "DueDate" => $request['DueDate'],
            "Status" => $request['Status'],
            "Name" => $request['Name'],
            "Description" => $request['Description'],
            "Rating" => $request['Rating'],
            'user_id' => $request['user_id'],
            'Budget' => $request['Budget'],
            'UserSign' => $user->id,
        ]);

        if ($request->has('activities') && is_array($request['activities'])) {
            foreach ($request['activities'] as $activity) {
                ActionTracking::create([
                    'parent_id' => $treatment->id,
                    'Name' => $activity['name'],
                    'Description' => $activity['description'],
                    'milestone_due_date' => $activity['due_date'],
                    'milestone_status' => 'Pending',
                    'is_milestone' => true,
                    'UserSign' => $user->id,
                    'ObjType' => $request['ObjType'],
                ]);
            }
        }

        if (isset($request->milestones) && is_array($request->milestones)) {
            foreach ($request->milestones as $mile) {
                $filePath = null;
                if (isset($mile['attachment']) && $mile['attachment']->isValid()) {
                    $fileName = $mile['attachment']->getClientOriginalName();
                    $mile['attachment']->move(public_path('milestone_attachments'), $fileName);
                    $filePath = 'milestone_attachments/' . $fileName;
                }
                ActionMilestone::create([
                    'action_id' => $treatment->id,
                    'milestone_name' => $mile['milestone_name'],
                    'due_date' => $mile['due_date'],
                    'status' => $mile['status'],
                    'attachment' => $filePath,
                    'progress' => 0,
                    'is_milestone' => true,
                ]);
            }
        }

        if ($request['ObjType'] == 19 && $request['selectedCauses']) {
            foreach ($request['selectedCauses'] as $cause) {
                $treatment->riskcauses()->attach($cause, ['ObjType' => 6]);
            }
        }

        // Handle selectedAssignments
        $selectedAssignments = $request['selectedAssignments'] ?? [];
        if (is_string($selectedAssignments)) {
            $selectedAssignments = json_decode($selectedAssignments, true) ?? [];
        }

        if ($request['ObjType'] != 42 && !empty($selectedAssignments) && is_array($selectedAssignments)) {
            foreach ($selectedAssignments as $assignment) {
                if (is_array($assignment) && isset($assignment['id'])) {
                    $treatment->users()->attach($assignment['id'], ['ObjType' => $request['ObjType']]);
                }
            }
        } elseif ($request['ObjType'] == 42 && !empty($selectedAssignments) && is_array($selectedAssignments)) {
            foreach ($selectedAssignments as $assignment) {
                $treatment->activityusers()->attach($assignment, ['ObjType' => $request['ObjType']]);
            }
        }

        DB::commit();
        return (new ApiResponseService())->apiSuccessResponseService("Treatment and activities created successfully");
    } catch (\Throwable $th) {
        DB::rollback();
        return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = ActionTracking::with('riskevent.item', 'riskcauses')->where('id', $id)->first();
            $data->milestone = ActionMilestone::where('action_id', $id)->get();

            $users = User::get();
            foreach ($users as $user) {
                $user->isSelected = RISK4::where('action_tracking_id', $id)
                    ->where('user_id', $user->id)
                    ->exists();
            }
            $data->users = $users;

            if ($data->milestone->isNotEmpty()) {
                $milestoneArr = $data->milestone->where('status', 5)->all();
                $actionPercent = (count($milestoneArr) / $data->milestone->count()) * 100;
                $data->action_percent = number_format($actionPercent, 2, '.', '');
            }

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
            'DueDate' => 'required',
            'user_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            ActionTracking::where('id', $id)->update([
                "DueDate" => $request['DueDate'],
                "Status" => $request['Status'],
                "Name" => $request['Name'],
                "Description" => $request['Description'],
                "Rating" => $request['Rating'],
                'user_id' => $request['user_id'],
            ]);

            if (isset($request->milestones) && is_array($request->milestones)) {
                foreach ($request->milestones as $mile) {
                    if (!empty($mile['id']) && !empty($mile['action_id'])) {
                        $filePath = null;
                        if (isset($mile['attachment']) && $mile['attachment']->isValid()) {
                            $fileName = $mile['attachment']->getClientOriginalName();
                            $mile['attachment']->move(public_path('milestone_attachments'), $fileName);
                            $filePath = 'milestone_attachments/' . $fileName;
                        }

                        ActionMilestone::where(['id' => $mile['id'], 'action_id' => $id])->update([
                            'milestone_name' => $mile['milestone_name'],
                            'due_date' => $mile['due_date'],
                            'status' => $mile['status'],
                            'attachment' => $filePath,
                        ]);
                    } elseif (empty($mile['id']) && empty($mile['action_id'])) {
                        $filePath = null;
                        if (isset($mile['attachment']) && $mile['attachment']->isValid()) {
                            $fileName = $mile['attachment']->getClientOriginalName();
                            $mile['attachment']->move(public_path('milestone_attachments'), $fileName);
                            $filePath = 'milestone_attachments/' . $fileName;
                        }

                        ActionMilestone::create([
                            'action_id' => $id,
                            'milestone_name' => $mile['milestone_name'],
                            'due_date' => $mile['due_date'],
                            'status' => $mile['status'],
                            'attachment' => $filePath,
                            'progress' => 0,
                            'is_milestone' => true,
                        ]);
                    }
                }
            }

            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Sync relationships for an action.
     *
     * @return string
     */
    public function syncRelForAction()
    {
        $actionID = \Request::get('action_id');
        $ItemID = \Request::get('ItemID');
        $isSelected = \Request::get('isSelected');

        $data = ActionTracking::where('id', $actionID)->first();

        if (filter_var($isSelected, FILTER_VALIDATE_BOOLEAN)) {
            $data->riskcauses()->attach($ItemID);
        } else {
            $data->riskcauses()->detach($ItemID);
        }

        return "Done";
    }

    /**
     * Get action tracking for ERM.
     *
     * @return \Illuminate\Http\Response
     */
    public function getActionTrackingForERM()
    {
        try {
            $RiskID = \Request::get('RiskID');
            $allLevelOneRisks = RISK5::where('parent', $RiskID)->pluck('o_r_i_s_k_id');

            $data = ORISK::with('item')->whereIn('o_i_t_m_id', $allLevelOneRisks)->get();

            foreach ($data as $val) {
                $val->expand = false;
                $val->items = ActionTracking::with('supervisor', 'users')->latest()
                    ->where('o_r_i_s_k_id', $val->id)
                    ->get();
            }

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get corruption prevention strategies.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCorruptionPreventionStrategies()
    {
        $CRM_ACTIVITY_OBJTYPE = 42;

        try {
            $RiskID = \Request::get('RiskID');

            $data = ActionTracking::with('supervisor')->latest()
                ->where('o_r_i_s_k_id', $RiskID)
                ->where('ObjType', '!=', $CRM_ACTIVITY_OBJTYPE)
                ->paginate(100);

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Update milestone status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMilestoneStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $milestone = ActionTracking::findOrFail($id);
        $milestone->update(['milestone_status' => $request->status]);

        $treatment = $milestone->parentTreatment;
        $completedActivities = $treatment->activities()->where('milestone_status', 'Completed')->count();
        $totalActivities = $treatment->activities()->count();

        $treatment->update([
            'progress' => ($totalActivities > 0) ? ($completedActivities / $totalActivities) * 100 : 0,
        ]);

        return response()->json(['message' => 'Milestone status updated successfully']);
    }
}