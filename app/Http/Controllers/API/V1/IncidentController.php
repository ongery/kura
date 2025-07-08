<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Incident;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Incident::with('creator')->latest()->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
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
        $user = Auth::user();
        $this->validate($request, [
            'summary'   =>  'required',
            'details'   =>  'required',
            'detected_on'   =>  'required',
            'began_on'  =>  'required',
        ], [
            'summary.required'  =>  'Summary under the Identification > Detection should not be blank.',
            'details.required'  =>  'Details under the Identification > Detection should not be blank.',
            'detected_on.required'  =>  'Detected On under the Identification > Detection should not be blank.',
            'began_on.required' =>  'Began On under the Identification > Detection should not be blank.',
        ]);
        DB::beginTransaction();
        try {
            $newData = Incident::create([
                'BunitID'       =>  $user->BunitID,
                'DocNum'        =>  rand(0, 3000),
                'communications'=>  json_encode($request->communications),
                'facilities'    =>  json_encode($request->facilities),
                'hardware'      =>  json_encode($request->hardware),
                'software'      =>  json_encode($request->software),
                'resource'      =>  json_encode($request->resource),
                "Title"         =>  (!empty($request->summary)) ? ucfirst($request->summary) : NULL,
                "Description"   =>  (!empty($request->details)) ? ucfirst($request->details) : NULL,
                "IncidentDate"  =>  (!empty($request->began_on)) ? $request->began_on : NULL,
                "IncidentReportOn"  =>  (!empty($request->detected_on)) ? $request->detected_on : NULL,
                'occurrence_type'=> (!empty($request->occurrence_type)) ? $request->occurrence_type : NULL,
                'direction'     =>  (!empty($request->direction)) ? $request->direction : NULL,
                'attack_vector' =>  (!empty($request->attack_vector)) ? $request->attack_vector : NULL,
                'detected_by'   =>  (!empty($request->detected_by)) ? $request->detected_by : NULL,
                'reported_by'   =>  (!empty($request->reported_by)) ? $request->reported_by : NULL,
                'owned_by'      =>  (!empty($request->owned_by)) ? $request->owned_by : NULL,
                'additional_stakeholders'   =>  (!empty($request->additional_stakeholder) && ($request->additional_stakeholder != null)) ? json_encode($request->additional_stakeholder) : NULL,
                'teams'         =>  (!empty($request->teams) && ($request->teams != null)) ? json_encode($request->teams) : NULL,
                'functional_impact' =>  (!empty($request->functional_impact)) ? $request->functional_impact : '1',
                'information_impact'=>  (!empty($request->information_impact)) ? $request->information_impact : '1',
                'recovery'      =>  (!empty($request->recovery)) ? $request->recovery : '1',
                'priority'      =>  (!empty($request->priority)) ? $request->priority : 0,
                'regions'       =>  (!empty($request->regions) && ($request->regions != null)) ? json_encode($request->regions) : NULL,
                'countries'     =>  (!empty($request->countries) && ($request->countries != null)) ? json_encode($request->countries) : NULL,
                'cities'        =>  (!empty($request->cities) && ($request->cities != null)) ? json_encode($request->cities) : NULL,
                'related_incidents' =>  (!empty($request->related_incidents) && ($request->related_incidents != null)) ? json_encode($request->related_incidents) : NULL,
                'related_risks' =>  (!empty($request->related_risk) && ($request->related_risk != null)) ? json_encode($request->related_risk) : NULL,
                'affected_assets'   =>  (!empty($request->affected_assets) && ($request->affected_assets != null)) ? json_encode($request->affected_assets) : NULL,
                'source_tags'   =>  (!empty($request->source_tags) && ($request->source_tags != null)) ? json_encode($request->source_tags) : NULL,
                'destination_tags'  =>  (!empty($request->destination_tags) && ($request->destination_tags != null)) ? json_encode($request->destination_tags) : NULL,
                "UserSign"      =>  $user->id,
            ]);

            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService($newData->id);
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
        $INCIDENT_OBJECT_TYPE = 39;
        try {
            $data = Incident::where('id', $id)->first();

            // $attachments = Attachment::where('ObjType', $INCIDENT_OBJECT_TYPE)
            //     ->where('DocEntry', $id)
            //     ->get();
            // $data->attachments = $attachments;
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
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
        $user = Auth::user();
        $this->validate($request, [
            'summary'   =>  'required',
            'details'   =>  'required',
            'detected_on'   =>  'required',
            'began_on'  =>  'required',
        ], [
            'summary.required'  =>  'Summary under the Identification > Detection should not be blank.',
            'details.required'  =>  'Details under the Identification > Detection should not be blank.',
            'detected_on.required'  =>  'Detected On under the Identification > Detection should not be blank.',
            'began_on.required' =>  'Began On under the Identification > Detection should not be blank.',
        ]);
        DB::beginTransaction();
        try {
            $newData = Incident::where('id', (int) $id)->update([
                'communications'=>  json_encode($request->communications),
                'facilities'    =>  json_encode($request->facilities),
                'hardware'      =>  json_encode($request->hardware),
                'software'      =>  json_encode($request->software),
                'resource'      =>  json_encode($request->resource),
                "Title"         =>  (!empty($request->summary)) ? ucfirst($request->summary) : NULL,
                "Description"   =>  (!empty($request->details)) ? ucfirst($request->details) : NULL,
                "IncidentDate"  =>  (!empty($request->began_on)) ? $request->began_on : NULL,
                "IncidentReportOn"  =>  (!empty($request->detected_on)) ? $request->detected_on : NULL,
                'occurrence_type'=> (!empty($request->occurrence_type)) ? $request->occurrence_type : NULL,
                'direction'     =>  (!empty($request->direction)) ? $request->direction : NULL,
                'attack_vector' =>  (!empty($request->attack_vector)) ? $request->attack_vector : NULL,
                'detected_by'   =>  (!empty($request->detected_by)) ? $request->detected_by : NULL,
                'reported_by'   =>  (!empty($request->reported_by)) ? $request->reported_by : NULL,
                'owned_by'      =>  (!empty($request->owned_by)) ? $request->owned_by : NULL,
                'additional_stakeholders'   =>  (!empty($request->additional_stakeholder) && ($request->additional_stakeholder != null)) ? json_encode($request->additional_stakeholder) : NULL,
                'teams'         =>  (!empty($request->teams) && ($request->teams != null)) ? json_encode($request->teams) : NULL,
                'functional_impact' =>  (!empty($request->functional_impact)) ? $request->functional_impact : '1',
                'information_impact'=>  (!empty($request->information_impact)) ? $request->information_impact : '1',
                'recovery'      =>  (!empty($request->recovery)) ? $request->recovery : '1',
                'priority'      =>  (!empty($request->priority)) ? $request->priority : 0,
                'regions'       =>  (!empty($request->regions) && ($request->regions != null)) ? json_encode($request->regions) : NULL,
                'countries'     =>  (!empty($request->countries) && ($request->countries != null)) ? json_encode($request->countries) : NULL,
                'cities'        =>  (!empty($request->cities) && ($request->cities != null)) ? json_encode($request->cities) : NULL,
                'related_incidents' =>  (!empty($request->related_incidents) && ($request->related_incidents != null)) ? json_encode($request->related_incidents) : NULL,
                'related_risks' =>  (!empty($request->related_risk) && ($request->related_risk != null)) ? json_encode($request->related_risk) : NULL,
                'affected_assets'   =>  (!empty($request->affected_assets) && ($request->affected_assets != null)) ? json_encode($request->affected_assets) : NULL,
                'source_tags'   =>  (!empty($request->source_tags) && ($request->source_tags != null)) ? json_encode($request->source_tags) : NULL,
                'destination_tags'  =>  (!empty($request->destination_tags) && ($request->destination_tags != null)) ? json_encode($request->destination_tags) : NULL,
            ]);

            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService($id);
        } catch (\Throwable $th) {
            DB::rollback();
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
        //
    }
}
