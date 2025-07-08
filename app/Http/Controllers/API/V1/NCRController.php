<?php

namespace App\Http\Controllers\API\V1;

use App\Models\NCR;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Shared\AuthHelperService;
use App\Services\Shared\ApiResponseService;

class NCRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {


            $data = NCR::latest()->get();
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
            'BunitID' => 'required|integer',
            "DocNum" => 'required',
            "AuditDate" => 'required',
            "AuditNo" => 'required',
            "AreaUnderReview" => 'required',
            "ClauseOfCriteriaDocument" => 'required',
        ]);
        DB::beginTransaction();
        try {

            $newData = NCR::create([
                'BunitID' => $request['BunitID'],
                "DocNum" => $request['DocNum'],
                "AuditDate" => $request['AuditDate'],
                "AuditNo" => $request['AuditNo'],
                "AreaUnderReview" => $request['AreaUnderReview'],
                "ClauseOfCriteriaDocument" => $request['ClauseOfCriteriaDocument'],
                "UserSign" => $user->id,
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
        try {
            $data = NCR::where('id', $id)
                ->first();

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Audit::where('id', $id)
                ->first();

            $data->update([
                "Title" => $request['Title'],
                "Description" => $request['Description'],
                "StartDate" => $request['StartDate'],
                "EndDate" => $request['EndDate'],
                "Objective" => $request['Objective'],
                "LeadAuditor" => $request['LeadAuditor'],
            ]);

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
