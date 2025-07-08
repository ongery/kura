<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\AuthHelperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();

            $data = Audit::whereIn('id', $businessUnitIds)->latest()->get();
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
            'Title' => 'required|min:5',
            'Description' => 'required',
            'Objective' => 'required',
            'LeadAuditor' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'LeadAuditor' => 'required',
        ]);
        DB::beginTransaction();
        try {

            $newData = Audit::create([
                'BunitID' => $user->BunitID,
                'DocNum' => rand(0, 3000),
                "Title" => $request['Title'],
                "Description" => $request['Description'],
                "StartDate" => $request['StartDate'],
                "EndDate" => $request['EndDate'],
                "Objective" => $request['Objective'],
                "LeadAuditor" => $request['LeadAuditor'],
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
            $data = Audit::where('id', $id)
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
