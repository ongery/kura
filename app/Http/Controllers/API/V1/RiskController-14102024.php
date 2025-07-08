<?php

namespace App\Http\Controllers\API\V1;

use App\Models\ORISK;
use App\Models\RISK1;
use App\Models\RISK2;
use App\Models\RISK5;
use Illuminate\Http\Request;
use App\Models\ActionTracking;
use App\Models\LikelihoodScale;
use App\Models\ConsequenceScale;
use App\Models\ConsequenceMatrix;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsequenceMatrixRank;
use App\Services\Shared\DocumentsService;
use App\Services\Shared\ApiResponseService;
use App\Services\Transactions\RisksServices;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ObjType = \Request::get('ObjType');
        $CorporateRiskId = \Request::get('CorporateRiskId');
        $BunitID = \Request::get('BunitID');

        try {
            $data = ORISK::with('ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale');
            if ($ObjType == "24") {
                $data = $data->with('corporateRisk');
            } else {
                $data = $data->with('item');
            }
            $data = $data->where(function ($q) use ($BunitID) {
                    if ($BunitID) {
                        $q->where('BunitID', $BunitID);
                    }
                })
                ->where('ObjType', $ObjType);
                if(!empty($CorporateRiskId)) {
                    $data = $data->whereHas('item', function ($q) use ($CorporateRiskId) {
                        $q->where('CorporateRiskID', $CorporateRiskId);
                    });
                }
                $data = $data->paginate(100);

                if(count($data) > 0) {
                    foreach($data as $key => $dt) {
                        if(!empty($dt->corporateRisk)) {
                            $data[$key]->item = $data[$key]->corporateRisk;
                            unset($data[$key]->corporateRisk);
                        }
                    }
                }

            foreach ($data as $key => $value) {
                $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($value->id, 24);
                $value->ic = $ic;

                $il = 0;
                if ($value->ilikelihoodscale) {
                    $il = $value->ilikelihoodscale->Base;
                }
                $value->il = $il;

                //ir
                $value->ir = $ic * $il;

                //R.C
                $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($value->id, 25);
                $value->rc = $rc;
                //R.L
                $rl = $value->rlikelihoodscale ? $value->rlikelihoodscale->Base : 0;
                $value->rl = $rl;
                //CC
                $value->cc = 0;
                if ($ic > 0) {
                    $value->cc = number_format((($ic - $rc) / $ic) * 100, 0);
                }

                //C.L
                $value->cl = 0;
                if ($il > 0) {
                    $value->cl = number_format((($il - $rl) / $il) * 100, 0);
                }
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            Log::info($th);
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
            'o_i_t_m_id' => 'required|integer',
            'ObjType' => 'required|integer',
        ]);
        DB::beginTransaction();
        try {
            $newData = ORISK::where('BunitID', $user->BunitID)
                ->where('o_i_t_m_id', $request['o_i_t_m_id'])
                ->first();
            if ($newData) {
                return (new ApiResponseService())->apiSuccessResponseService($newData->id);
            }
            $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
            $newData = ORISK::create([
                'BunitID' => $user->BunitID,
                'DocNum' => $DocNum,
                "o_i_t_m_id" => $request['o_i_t_m_id'],
                "ObjType" => $request['ObjType'],
            ]);

            (new RisksServices())->createInherentConsequence($newData->id);
            (new DocumentsService())->updateNumbering($request['ObjType']);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService($newData->id);
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Store Risk a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewRisk (Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'o_i_t_m_id'    =>  'required|integer',
            'ObjType'       =>  'required|integer',
            'risk_subject'  =>  'required',
            'threat_mapping'=>  'nullable',
            'risk_mapping'  =>  'nullable',
            'risk_source'   =>  'nullable',
            'category'      =>  'nullable',
        ],[
            'risk_subject.required'     =>  '* Subject should not be empty',
            'threat_mapping.nullable'   =>  '* Threat Mapping should not be empty',
            'risk_mapping.nullable'     =>  '* Risk Mapping should not be empty',
            'risk_source.nullable'      =>  '* Risk Source should not be empty',
            'category.nullable'         =>  '* Category should not be empty',
        ]);
        DB::beginTransaction();
        try {
            $newData = ORISK::where('BunitID', $user->BunitID)
                ->where('o_i_t_m_id', $request['o_i_t_m_id'])
                ->first();
            if ($newData) {
                return (new ApiResponseService())->apiSuccessResponseService($newData->id);
            }
            $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
            $newData = ORISK::create([
                'BunitID'       =>  $user->BunitID,
                'DocNum'        =>  $DocNum,
                'o_i_t_m_id'    =>  $request['o_i_t_m_id'],
                'ObjType'       =>  $request['ObjType'],
                'Name'          =>  $request['risk_subject'],
                'threat_mapping'=>  $request['threat_mapping'],
                'risk_mapping'  =>  $request['risk_mapping'],
                'risk_source'   =>  $request['risk_source'],
                'category'      =>  $request['category'],
                'risk_scoring'  =>  $request['risk_scoring'],
                'site_location' =>  $request['site_location'],
                'current_likehood'  =>  $request['current_likehood'],
                'external_reference_id' =>  $request['external_reference'],
                'current_impact'=>  $request['current_impact'],
                'control_regulation'=>  $request['control_regulation'],
                'control_number'=>  $request['control_number'],
                'affected_assets'   =>  $request['affected_assets'],
                'technology'    =>  $request['technology'],
                'team'          =>  $request['team'],
                'add_stockholders'  =>  $request['additional_stockholder'],
                'owner'         =>  $request['owner'],
                'owners_manager'=>  $request['owner_manager'],
                'risk_assessment'   =>  $request['risk_assessment'],
                'additional_note'   =>  $request['additional_note'],
                'support_docs'  =>  $request['support_docs']
            ]);

            (new RisksServices())->createInherentConsequence($newData->id);
            (new DocumentsService())->updateNumbering($request['ObjType']);
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
            $data = ORISK::with('bunit', 'item', 'itemevents')->where('id', $id)
                ->first();

            $data->scalesgroup = RISK2::with('item')->where('o_r_i_s_k_id', $id)->where('ObjType', 24)->get();
            $data->scalesgroupresidual = RISK2::with('item')->where('o_r_i_s_k_id', $id)->where('ObjType', 25)->get();

            // INHERENT RISK LEVEL CONSEQUENCE MATRIX
            if ($data->scalesgroup->count() > 0) {
                foreach ($data->scalesgroup as $key => $scgrp) {
                    if ($scgrp->item) {
                        $consequenceMatrix = ConsequenceMatrix::select('id', 'Fundamental')->where('ImpactMeasure', 'like', $scgrp->item->Name.'%')->get();
                        if(count($consequenceMatrix) > 0) {
                            foreach($consequenceMatrix as $cKey => $cMatrix) {
                                $cmFundamantelArray = ConsequenceMatrix::select('Major', 'Moderate', 'Minor', 'Insignificant')->where('Fundamental', $cMatrix->Fundamental)->first();
                                $consequenceMatrix[$cKey]->Major = $cmFundamantelArray->Major;
                                $consequenceMatrix[$cKey]->Moderate = $cmFundamantelArray->Moderate;
                                $consequenceMatrix[$cKey]->Minor = $cmFundamantelArray->Minor;
                                $consequenceMatrix[$cKey]->Insignificant = $cmFundamantelArray->Insignificant;

                                $levelArr = ConsequenceMatrixRank::select('level')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('groupType', 1)->first(['level']);
                                $consequenceMatrix[$cKey]->level = ($levelArr) ? $levelArr->level : 'Insignificant';
                                
                                $valueArr = ConsequenceMatrixRank::select('value')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('groupType', 1)->first(['value']);
                                $consequenceMatrix[$cKey]->value = ($valueArr)  ? $valueArr->value : 1;
                            }
                        }
                        $data->scalesgroup[$key]->ConsequenceMatrix = $consequenceMatrix;
                    }
                }
            }

            // RESIDUAL RISK LEVEL CONSEQUENCE MATRIX
            if ($data->scalesgroupresidual->count() > 0) {
                foreach ($data->scalesgroupresidual as $key => $scgrp) {
                    if ($scgrp->item) {
                        $consequenceMatrix = ConsequenceMatrix::select('id', 'Fundamental')->where('ImpactMeasure', 'like', $scgrp->item->Name.'%')->get();
                        if(count($consequenceMatrix) > 0) {
                            foreach($consequenceMatrix as $cKey => $cMatrix) {
                                $cmFundamantelArray = ConsequenceMatrix::select('Major', 'Moderate', 'Minor', 'Insignificant')->where('Fundamental', $cMatrix->Fundamental)->first();
                                $consequenceMatrix[$cKey]->Major = $cmFundamantelArray->Major;
                                $consequenceMatrix[$cKey]->Moderate = $cmFundamantelArray->Moderate;
                                $consequenceMatrix[$cKey]->Minor = $cmFundamantelArray->Minor;
                                $consequenceMatrix[$cKey]->Insignificant = $cmFundamantelArray->Insignificant;

                                $levelArr = ConsequenceMatrixRank::select('level')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('groupType', 2)->first(['level']);
                                $consequenceMatrix[$cKey]->level = ($levelArr) ? $levelArr->level : 'Insignificant';
                                
                                $valueArr = ConsequenceMatrixRank::select('value')->where('section', $cMatrix->id)->where('scalesGroupId',$scgrp->id)->where('groupType', 2)->first(['value']);
                                $consequenceMatrix[$cKey]->value = ($valueArr)  ? $valueArr->value : 1;
                            }
                        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        // DB::beginTransaction();
        // try {
        //     $newData = ORISK::where('id', $id)
        //         ->update([
        //             "Name" => $request['Name'],
        //             "DateIdentified" => $request['DateIdentified'],
        //             "RiskCauseDescription" => $request['RiskCauseDescription'],
        //             "RiskEffectsDescription" => $request['RiskEffectsDescription'],
        //         ]);
        //     DB::commit();
        //     return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        // }
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

    public function syncRelationship()
    {
        $RiskID = \Request::get('RiskID');
        $ItemID = \Request::get('ItemID');
        $isSelected = \Request::get('isSelected');
        $ObjType = \Request::get('ObjType');

        $risk = ORISK::where('id', $RiskID)->first();

        $isTrue = filter_var($isSelected, FILTER_VALIDATE_BOOLEAN);
        if ($isTrue) {
            $risk->causesimpact()->attach($ItemID, ['ObjType' => $ObjType]);
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        }
        $risk->causesimpact()->detach($ItemID);
        return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
    }

    public function approveRisk($id)
    {
        DB::beginTransaction();
        try {
            $newData = ORISK::where('id', $id)
                ->update([
                    "Status" => 1,
                ]);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function likeLihoodScale()
    {
        try {
            $data = LikelihoodScale::get();

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function updateAnalzeRisk(Request $request)
    {
        try {
            $risk = ORISK::where('id', $request['id'])->first();
            $risk->update([
                'InherentLikelihoodScale' => $request['InherentLikelihoodScale'],
                'ResidualLikelihoodScale' => $request['ResidualLikelihoodScale'],
                'ResidualConsequenceScale' => $request['ResidualConsequenceScale'],
                "Name" => $request['Name'],
            ]);

            // INHERENT RISK LEVEL CONSEQUENCE MATRIX
            $scalesgroup = $request['scalesgroup'];
            foreach ($scalesgroup as $key => $value) {
                RISK2::where('id', $value['id'])->update(["i_t_m_1_id" => $value['i_t_m_1_id'],]);

                // INHERENT CONSEQUENCE MATRIX
                // if(count($value['ConsequenceMatrix']) > 0) {
                //     foreach($value['ConsequenceMatrix'] as $cMatrix) {
                //         $consequence = ConsequenceMatrixRank::where('section', $cMatrix['id'])->where('scalesGroupId', $value['id'])->where('groupType', 1);
                //         if($consequence->exists()) {
                //             $consequence->update(['level' => ucwords($cMatrix['level']), 'value' => $cMatrix['value']]);
                //         }
                //         else {
                //             ConsequenceMatrixRank::create([
                //                 'scalesGroupId' =>  $value['id'],
                //                 'groupType'     =>  1,
                //                 'segment'       =>  (int) $value['item']['id'],
                //                 'section'       =>  (int) $cMatrix['id'],
                //                 "level"         =>  ucwords($cMatrix['level']),
                //                 "value"         =>  (int) $cMatrix['value'],
                //             ]);
                //         }
                //     }
                // }
            }

            // RESIDUAL RISK LEVEL CONSEQUENCE MATRIX
            $scalesgroupResidual = $request['scalesgroupResidual'];
            foreach ($scalesgroupResidual as $key => $value) {
                RISK2::where('id', $value['id'])->update(["i_t_m_1_id" => $value['i_t_m_1_id'],]);

                // RESIDUAL CONSEQUENCE MATRIX
                // if(count($value['ConsequenceMatrix']) > 0) {
                //     foreach($value['ConsequenceMatrix'] as $cMatrix) {
                //         $consequence = ConsequenceMatrixRank::where('section', $cMatrix['id'])->where('scalesGroupId', $value['id'])->where('groupType', 2);
                //         if($consequence->exists()) {
                //             $consequence->update(['level' => ucwords($cMatrix['level']), 'value' => $cMatrix['value']]);
                //         }
                //         else {
                //             ConsequenceMatrixRank::create([
                //                 'scalesGroupId' =>  $value['id'],
                //                 'groupType'     =>  2,
                //                 'segment'       =>  (int) $value['item']['id'],
                //                 'section'       =>  (int) $cMatrix['id'],
                //                 "level"         =>  ucwords($cMatrix['level']),
                //                 "value"         =>  (int) $cMatrix['value'],
                //             ]);
                //         }
                //     }
                // }
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService("Creted Successfully");
        } catch (\Throwable $th) {
            return $th;
        }
    }
    /**
     * Loading Consequence Scale
     */
    public function loadConsequenceScale()
    {
        try {
            $data = ConsequenceScale::get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get Lelel One risks
     */

    public function getLevelOneRisk()
    {

        $ObjType = \Request::get('ObjType');
        $BunitID = \Request::get('BunitID');
        $RiskID = \Request::get('RiskID');
        $paginate = \Request::get('paginate') ?? 0;

        $search = \Request::get('search');
        try {

            $data = ORISK::with('item')
                ->where(function ($q) use ($BunitID) {
                    if ($BunitID) {
                        $q->where('BunitID', $BunitID);
                    }
                })
                ->where('ObjType', $ObjType)
                ->where(function ($q) use ($paginate) {
                    if ($paginate == 1) {
                        $q->take(10);
                    }
                })
                ->get();

            if ($paginate == 1) {
                $data = ORISK::with('item')
                    ->where(function ($q) use ($BunitID) {
                        if ($BunitID) {
                            $q->where('BunitID', $BunitID);
                        }
                    })
                    ->where('ObjType', $ObjType)
                    ->take(10)
                    ->get();
            }

            if ($RiskID) {
                foreach ($data as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK5::where('o_r_i_s_k_id', $value->id)->where('parent', $RiskID)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function findERMRiskLevelOne()
    {
        $ObjType = \Request::get('ObjType');
        $BunitID = \Request::get('BunitID');
        $RiskID = \Request::get('RiskID');
        $paginate = \Request::get('paginate') ?? 0;
        $search = \Request::get('q');
        try {

            if (!$search) {
                return (new ApiResponseService())
                    ->apiSuccessResponseService();
            }
            $data = ORISK::with('item')
                ->where('ObjType', $ObjType)
                ->where(function ($q) use ($BunitID) {
                    if ($BunitID) {
                        $q->where('BunitID', $BunitID);
                    }
                })
                ->whereHas('item', function ($q) use ($search) {
                    $q->where('Name', 'LIKE', "%$search%");
                })
                ->take(10)
                ->get();

            if ($RiskID) {
                foreach ($data as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK5::where('o_r_i_s_k_id', $value->id)->where('parent', $RiskID)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function syncMainRiskRelationship()
    {
        $RiskID = \Request::get('RiskID');
        $ItemID = \Request::get('ItemID');

        $isSelected = \Request::get('isSelected');
        $ObjType = \Request::get('ObjType');

        $risk = ORISK::where('id', $RiskID)->first();
        $isTrue = filter_var($isSelected, FILTER_VALIDATE_BOOLEAN);
        if ($isTrue) {
            $risk->levelonerisk()->attach($ItemID, ['ObjType' => $ObjType]);
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        }
        $risk->levelonerisk()->detach($ItemID);
        return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
    }

    public function getLevelOneRiskForQMS()
    {
        $ObjType = \Request::get('ObjType');
        $ProcedureID = \Request::get('ProcedureID');

        try {
            $data = ORISK::with('item')
                ->where('ObjType', $ObjType)
                ->get();
            if ($ProcedureID) {
                foreach ($data as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $value->id)
                        ->where('o_i_t_m_id', $ProcedureID)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRiskTreatmentAction()
    {
        $CRM_ACTIVITY_OBJTYPE = 42;

        try {
            $RiskID = \Request::get('RiskID');
            $data = ActionTracking::with('supervisor', 'users')->latest()
                ->where('o_r_i_s_k_id', $RiskID)
                ->where('ObjType', '!=', $CRM_ACTIVITY_OBJTYPE)
                ->get();

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function importRiskData (Request $request)
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            if(!empty($request['risk_subject'])) {
                $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
                $data = [
                    'BunitID'           =>  $user->BunitID,
                    'DocNum'            =>  $DocNum,
                    'o_i_t_m_id'        =>  $request['o_i_t_m_id'],
                    'ObjType'           =>  $request['ObjType'],
                    'Name'              =>  $request['risk_subject'],
                    'threat_mapping'    =>  $request['threat_mapping'],
                    'risk_mapping'      =>  $request['risk_mapping'],
                    'risk_source'       =>  $request['risk_source'],
                    'category'          =>  $request['category'],
                    'risk_scoring'      =>  $request['risk_scoring'],
                    'site_location'     =>  $request['site_location'],
                    'current_likehood'  =>  $request['current_likehood'],
                    'external_reference_id' =>  $request['external_reference'],
                    'current_impact'    =>  $request['current_impact'],
                    'control_regulation'=>  $request['control_regulation'],
                    'control_number'    =>  $request['control_number'],
                    'affected_assets'   =>  $request['affected_assets'],
                    'technology'        =>  $request['technology'],
                    'team'              =>  $request['team'],
                    'add_stockholders'  =>  $request['additional_stockholder'],
                    'owner'             =>  $request['owner'],
                    'owners_manager'    =>  $request['owner_manager'],
                    'risk_assessment'   =>  $request['risk_assessment'],
                    'additional_note'   =>  $request['additional_note'],
                    // 'support_docs'  =>  $request['support_docs']
                ];
                $newData = ORISK::create($data);

                (new RisksServices())->createInherentConsequence($newData->id);
                (new DocumentsService())->updateNumbering($request['ObjType']);
                DB::commit();
            }
            return (new ApiResponseService())->apiSuccessResponseService($newData->id);
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function manageConsequenceMatrixRanking (Request $request)
    {
        DB::beginTransaction();
        try {
            $sectionCount = ConsequenceMatrixRank::where([
                        'scalesGroupId' =>  (int) $request->scalesGroupId,
                        'groupType'     =>  (int) $request->groupType,
                        'segment'       =>  (int) $request->segment, 
                        'section'       =>  (int) $request->section
                    ]);
            if($sectionCount->count() > 0) {
                $sectionCount->update(['level' => $request->level, 'value' => (int) $request->value]);

                DB::commit();
                return (new ApiResponseService())->apiSuccessResponseService("Ranking Updated Successfully");
            }
            else {
                $newData = ConsequenceMatrixRank::create([
                    'scalesGroupId' =>  (int) $request->scalesGroupId,
                    'groupType' =>  (int) $request->groupType,
                    'segment'   =>  (int) $request->segment,
                    'section'   =>  (int) $request->section,
                    "level"     =>  $request->level,
                    "value"     =>  (int) $request->value,
                ]);

                DB::commit();
                return (new ApiResponseService())->apiSuccessResponseService("Ranking Created Successfully");
            }
        } catch (\Throwable$th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

}
