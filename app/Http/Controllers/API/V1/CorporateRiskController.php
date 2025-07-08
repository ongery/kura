<?php

namespace App\Http\Controllers\API\V1;

use App\Models\OITM;
use App\Models\User;
use App\Models\ORISK;
use App\Models\RISK1;
use App\Models\RISK2;
use App\Models\RISK5;
use Illuminate\Http\Request;
use App\Models\CorporateRisks;
use App\Models\ConsequenceMatrix;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ConsequenceMatrixRank;
use App\Services\Shared\DocumentsService;
use App\Services\Shared\ApiResponseService;
use App\Services\Transactions\RisksServices;
use App\Services\Transactions\ConsequenceScaleServices;

class CorporateRiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ObjType = \Request::get('ObjType');
        try {
            $data = CorporateRisks::where('ObjType', '24')->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
        ],[
            'Name.required' =>  '* CR Name should be required.',
            'Name.string'   =>  '* CR Name text should be string.',
            'Name.min'      =>  '* CR Name length should not be less than 4 character.',
            'Name.max'      =>  '* CR Name length should not be greater than 191 character.',
        ]);
        $cRisk = CorporateRisks::where('Name', $request['Name'])->where('ObjType', $request['ObjType'])->first();
        if ($cRisk) {
            return (new ApiResponseService())->apiFailedResponseService("Corportate Risk Already Exist");
        }

        DB::beginTransaction();
        try {
            $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
            $data = [
                "DocNum"    =>  $DocNum,
                "ObjType"   =>  (string) $request['ObjType'],
                "Name"      =>  $request['Name'],
                "Description"   =>  $request['Description']
            ];

            $newData = CorporateRisks::create($data);

            (new DocumentsService())->updateNumbering($request['ObjType']);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Corporate Risk Created Successfully");
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
    public function show(Request $request, $id)
    {
        try {
            $data = ORISK::with('bunit', 'corporateRisk', 'itemevents')->where('id', $id)->first();
            if ($data) {
                $data->item = $data->corporateRisk->toArray();
                unset($data->corporateRisk);
            }

            $data->scalesgroup = RISK2::with('item')->where('o_r_i_s_k_id', $id)->where('ObjType', 24)->get();
            $data->scalesgroupresidual = RISK2::with('item')->where('o_r_i_s_k_id', $id)->where('ObjType', 25)->get();

            // INHERENT RISK LEVEL CONSEQUENCE MATRIX
            if ($data->scalesgroup->count() > 0) {
                foreach ($data->scalesgroup as $key => $scgrp) {
                    if ($scgrp->item) {
                        $consequenceFandamental = [];
                        $consequenceMatrix = ConsequenceMatrix::select('id', 'Fundamental')->where('ImpactMeasure', 'like', $scgrp->item->Name.'%')->get();
                        if(count($consequenceMatrix) > 0) {
                            foreach($consequenceMatrix as $cKey => $cMatrix) {
                                $cmFundamantelArray = ConsequenceMatrix::select('Major', 'Moderate', 'Minor', 'Insignificant')->where('Fundamental', $cMatrix->Fundamental)->first();
                                
                                $consequenceMatrix[$cKey]->Major    =   $cmFundamantelArray->Major;
                                $consequenceMatrix[$cKey]->Moderate =   $cmFundamantelArray->Moderate;
                                $consequenceMatrix[$cKey]->Minor    =   $cmFundamantelArray->Minor;
                                $consequenceMatrix[$cKey]->Insignificant    =   $cmFundamantelArray->Insignificant;

                                $levelValArr = ConsequenceMatrixRank::select('level','value')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('location', $request->location)->where('groupType', 1)->first();
                                $consequenceMatrix[$cKey]->level = ($levelValArr) ? $levelValArr->level : 'Insignificant';
                                $consequenceMatrix[$cKey]->value = ($levelValArr)  ? $levelValArr->value : 1;

                                $dataArr = array(
                                    'lValue' => ($levelValArr)  ? $levelValArr->value : 1,
                                    'lFundamental' => $cMatrix->Fundamental
                                );
                                if(!empty($cMatrix->Fundamental)) { array_push($consequenceFandamental, $dataArr); }
                            }
                        }
                        $data->scalesgroup[$key]->highestRank = ConsequenceMatrixRank::where('scalesGroupId', $scgrp->id)->where('location', $request->location)->where('groupType', 1)->max('value') ?? 1;
                        $data->scalesgroup[$key]->ConsequenceFandamental = $consequenceFandamental;
                        $data->scalesgroup[$key]->ConsequenceMatrix = $consequenceMatrix;
                    }
                }
            }

            // RESIDUAL RISK LEVEL CONSEQUENCE MATRIX
            if ($data->scalesgroupresidual->count() > 0) {
                foreach ($data->scalesgroupresidual as $key => $scgrp) {
                    if ($scgrp->item) {
                        $consequenceFandamental = [];
                        $consequenceMatrix = ConsequenceMatrix::select('id', 'Fundamental')->where('ImpactMeasure', 'like', $scgrp->item->Name.'%')->get();
                        if(count($consequenceMatrix) > 0) {
                            foreach($consequenceMatrix as $cKey => $cMatrix) {
                                $cmFundamantelArray = ConsequenceMatrix::select('Major', 'Moderate', 'Minor', 'Insignificant')->where('Fundamental', $cMatrix->Fundamental)->first();
                                
                                $consequenceMatrix[$cKey]->Major    =   $cmFundamantelArray->Major;
                                $consequenceMatrix[$cKey]->Moderate =   $cmFundamantelArray->Moderate;
                                $consequenceMatrix[$cKey]->Minor    =   $cmFundamantelArray->Minor;
                                $consequenceMatrix[$cKey]->Insignificant    =   $cmFundamantelArray->Insignificant;

                                $levelValArr = ConsequenceMatrixRank::select('level','value')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('location', $request->location)->where('groupType', 2)->first();
                                $consequenceMatrix[$cKey]->level = ($levelValArr) ? $levelValArr->level : 'Insignificant';
                                $consequenceMatrix[$cKey]->value = ($levelValArr)  ? $levelValArr->value : 1;

                                $dataArr = array(
                                    'lValue' => ($levelValArr)  ? $levelValArr->value : 1,
                                    'lFundamental' => $cMatrix->Fundamental
                                );
                                if(!empty($cMatrix->Fundamental)) { array_push($consequenceFandamental, $dataArr); }
                            }
                        }
                        $data->scalesgroupresidual[$key]->highestRank = ConsequenceMatrixRank::where('scalesGroupId', $scgrp->id)->where('groupType', 2)->where('location', $request->location)->max('value') ?? 1;
                        $data->scalesgroupresidual[$key]->ConsequenceFandamental = $consequenceFandamental;
                        $data->scalesgroupresidual[$key]->ConsequenceMatrix = $consequenceMatrix;
                    }
                }
            }

            if ($data->Status == 0) {
                $data->RiskStatus = "Pending Approval";
            }

            if ($data->Status == 1) {
                $data->RiskStatus = "Approved";
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())
                ->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
        ],[
            'Name.required' =>  '* CR Name should be required.',
            'Name.string'   =>  '* CR Name text should be string.',
            'Name.min'      =>  '* CR Name length should not be less than 4 character.',
            'Name.max'      =>  '* CR Name length should not be greater than 191 character.',
        ]);
        $cRisk = CorporateRisks::where('Name', $request['Name'])->where('ObjType', $request['ObjType'])->where('id','<>', $request->id)->first();
        if ($cRisk) {
            return (new ApiResponseService())->apiFailedResponseService("Corportate Risk Already Exist");
        }

        DB::beginTransaction();
        try {
            $data = [
                "Name"      =>  $request['Name'],
                "Description"   =>  $request['Description']
            ];

            $newData = CorporateRisks::where('id', $request->id)->update($data);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Corporate Risk Updated Successfully");
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $oitms = CorporateRisks::findOrFail($id);
            if($oitms) {
                $oitms->delete();
                return (new ApiResponseService())->apiSuccessResponseService("Corporate Risk Deleted Successfully");
            }
            return (new ApiResponseService())->apiFailedResponseService('Failed to Delete Corporate Risk, Try again');
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
