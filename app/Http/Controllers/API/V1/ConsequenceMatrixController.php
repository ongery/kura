<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\ConsequenceMatrix;
use App\Models\ConsequenceMatrixRank;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsequenceMatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $impactMeasures = ConsequenceMatrix::selectRaw('ImpactMeasure, MIN(id) as id')->groupBy('ImpactMeasure')->get();
            foreach ($impactMeasures as $key => $val) {
                $val->allData = ConsequenceMatrix::where('ImpactMeasure', $val->ImpactMeasure)->get();
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($impactMeasures);
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

            //$DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
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
        } catch (\Throwable$th) {
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
        //
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
        //
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
