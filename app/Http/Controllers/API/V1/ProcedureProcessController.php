<?php

namespace App\Http\Controllers\API\V1;

use App\Models\WorkPlan;
use App\Models\ProfileData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Qms\Procedure;
use App\Models\Qms\ProcedureRows;
use Illuminate\Support\Facades\Auth;
use App\Services\Shared\ApiResponseService;


class ProcedureProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $data = Procedure::get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
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
            $data = Procedure::with('bunit')->where('id', $id)->first();

            $data->fullImagePath = asset('uploads/' . $data->Diagram);
            $data->logoPath = asset('uploads/logo.png');
            $data->Custodian = $data->bunit->Name;
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

        $this->validate($request, [
            'BunitID' => 'required',
            'DocNum' => 'required',
            'title' => 'required',
            'Subject' => 'required',
            'IssueNo' => 'required',

        ]);

        try {
            Procedure::create([
                'BunitID' => $request['BunitID'],
                'DocNum' => $request['DocNum'],
                'title' => $request['title'],
                'Subject' => $request['Subject'],
                'IssueNo' => $request['IssueNo']
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Created Successfully");
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
            'Purpose' => 'required',
            'Scope' => 'required',
            'PrincipalResponsibility' => 'required',
        ]);


        try {

            $profileData = Procedure::where('id', $id)->first();
            $profileData->update([
                "Purpose" => $request['Purpose'],
                "Scope" => $request['Scope'],
                "PrincipalResponsibility" => $request['PrincipalResponsibility'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
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
        } catch (\Throwable $th) {
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
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }



    public function procedureProcessRows(Request $request)
    {


        try {

            $this->validate($request, [
                'procedure_id' => 'required',
            ]);
            $procedureRows = ProcedureRows::where('content_id', $request['category_id'])
                ->where('procedure_id', $request['procedure_id'])
                ->OrderBy('position', 'desc')
                ->first();


            ProcedureRows::create([
                'content_id' => $request['category_id'],
                'procedure_id' => $request['procedure_id'],
                'position' => $procedureRows?->position + 1,
                'Description' => $request['Description'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function getProcedureProcessRows(Request $request)
    {

        try {

            $procedureRows = ProcedureRows::where('content_id', $request['category_id'])
                ->where('procedure_id', $request['procedure_id'])
                ->OrderBy('position', 'asc')
                ->get();

            foreach ($procedureRows as $key => $val) {
                $val->DocNum = $val->content_id . "." . $val->position;
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($procedureRows);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function moveUp($id)
    {

        try {

            $rowToMove = ProcedureRows::where('id', $id)->first();


            $originalPosition = $rowToMove->position;
            $rowToMoveDown = ProcedureRows::where('content_id', $rowToMove->content_id)
                ->where('procedure_id', $rowToMove->procedure_id)
                ->where('position', $rowToMove->position - 1)
                ->first();

            if (!$rowToMoveDown) {
                return (new ApiResponseService())
                    ->apiSuccessResponseService("Done");
            }

            $rowToMove->update([
                'position' => $rowToMoveDown->position
            ]);

            $rowToMoveDown->update([
                'position' => $originalPosition
            ]);

            return (new ApiResponseService())
                ->apiSuccessResponseService("Done");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function updateDescription(Request $request, $id)
    {





        try {

            $userdata = ProcedureRows::where('id', $id)->first();

            $userdata->update([
                'Description' => $request['Description']
            ]);

            return (new ApiResponseService())
                ->apiSuccessResponseService("Done");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function updateProcedureImage(Request $request, $id)
    {
        $profileData = Procedure::where('id', $id)->first();

        $file = $request->file('records');
        $fileName = time() . '.' . $request->records->getClientOriginalExtension();

        $file->move(public_path("uploads"), $fileName);

        $profileData->update([
            'Diagram' => $fileName
        ]);

        return (new ApiResponseService())
            ->apiSuccessResponseService("Done");
    }
}
