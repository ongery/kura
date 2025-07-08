<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ProfileData;
use App\Models\WorkPlan;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $data = WorkPlan::get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $data = WorkPlan::where('id', $id)->first();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
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
            'Activity' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'Output' => 'required',
            'Budget' => 'required',
            'Status' => 'required',
            'BunitID' => 'required',
            'UserSign' => 'required',
            'scorecard_id' => 'required',

        ]);

        try {
            WorkPlan::create([
                'scorecard_id' => $request['scorecard_id'],
                'Activity' => $request['Activity'],
                'StartDate' => $request['StartDate'],
                'EndDate' => $request['EndDate'],
                'Output' => $request['Output'],
                'Budget' => $request['Budget'],
                'Status' => $request['Status'],
                'BunitID' => $request['BunitID'],
                'UserSign' => $request['UserSign'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable$th) {
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

        $STRATEGIC_PILLAR_OBJTYPE = 103;

        $this->validate($request, [
            'ObjType' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request['ObjType'] = $STRATEGIC_PILLAR_OBJTYPE) {
            $this->validate($request, [
                'title' => 'required',
            ]);
        }
        try {

            $profileData = ProfileData::where('id', $id)->first();
            $profileData->update([
                "ObjType" => $request['ObjType'],
                "description" => $request['description'],
                "title" => $request['title'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $profileData = ProfileData::where('id', $id)->first();
            $profileData->delete();
            return (new ApiResponseService())
                ->apiSuccessResponseService("Delete Successfully");
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function getUserActions()
    {
        $user = Auth::user();
        try {
            $data = WorkPlan::where('UserSign', $user->id)->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function recordWorkPlanOutput(Request $request, $id)
    {

        $this->validate($request, [
            'ActualOutput' => 'required',
        ]);

        try {

            $profileData = WorkPlan::where('id', $id)->first();
            $profileData->update([
                "ActualOutput" => $request['ActualOutput'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
