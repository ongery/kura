<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\OITM;
use App\Models\OKRI;
use App\Models\ORISK;
use App\Models\RISK1;
use App\Models\RISK3;
use App\Models\RISK4;
use App\Models\RISK5;
use App\Models\User;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\ConsequenceScaleServices;
use App\Services\Transactions\RisksServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiskLibrarySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ObjType = \Request::get('ObjType');
        $BunitID = \Request::get('BunitID');
        $fraudRiskID = \Request::get('fraudRiskID');
        try {
            $data = OITM::with('category')->where('ObjType', $ObjType)
                ->where(function ($q) use ($BunitID) {
                    if ($BunitID) {
                        $q->where('BunitID', $BunitID);
                    }
                })
                ->paginate(10000);

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
            'Name' => 'required|string|min:4,max:191',
            'ObjType' => 'required|integer',
            'CorporateRiskID' => (isset($request->PageTitle) && ($request->PageTitle !== 'rc-scales')) ? 'required' : 'nullable'
        ], [
            'Name.required' =>  '* Name should be required.',
            'Name.string'   =>  '* Name text should be string.',
            'Name.min'      =>  '* Name length should not be less than 4 character.',
            'Name.max'      =>  '* Name length should not be greater than 191 character.',
            'ObjType.required'  =>  '* ObjType should be required.',
            'ObjType.integer'   =>  '* ObjType should be in Integer.',
            'CorporateRiskID.required'  =>  '* corporate Risk should be required.',
        ]);

        $user = Auth::user();
        if ($request['ObjType'] == 7 || $request['ObjType'] == 8 || $request['ObjType'] == 9) {
            $this->validate($request, [
                'CategoryID' => 'required|integer',
            ]);
        }

        $fileName = null;
        if ($request['ObjType'] == 26) {
            $this->validate($request, [
                'records' => 'required|mimes:pdf|max:2048',
            ]);
            $fileName = time() . '.' . $request->records->getClientOriginalExtension();
            $request->records->storeAs('files', $fileName);
        }
        $data = OITM::where('Name', $request['Name'])
            ->where('ObjType', $request['ObjType'])
            ->first();
        if ($data) {
            return (new ApiResponseService())->apiFailedResponseService("Already Exist");
        }

        DB::beginTransaction();
        try {
            $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);

            $data = [
                'DocNum'        =>  $DocNum,
                "Name"          =>  $request['Name'],
                "ObjType"       =>  $request['ObjType'],
                "BunitID"       =>  $request['BunitID'] ?? null,
                "description"   =>  $request['description'],
                "CategoryID"    =>  $request['CategoryID'],
                "CorporateRiskID"   =>  $request['CorporateRiskID'],
                "RiskLevelID"   =>  $request['RiskLevelID'],
                "parent_id"     =>  $request['parent_id'] ?? null,
                "o_r_i_s_k_id"  =>  $request['o_r_i_s_k_id'] ?? null,
                "file_path"     =>  $fileName,
            ];

            $newData = OITM::create($data);

            if ($request['ObjType'] == 10 || $request['ObjType'] == 32) {
                (new ConsequenceScaleServices())->createConsequenceScale($newData->id);
                (new RisksServices())->addScaleGroupToRisk($newData->id);
            }

            if ($request['ObjType'] == 32) {
                $DocNum = (new DocumentsService())->documentNumembering(33);
                $newRiskEvent = ORISK::create([
                    'BunitID' => $user->BunitID,
                    'DocNum' => $DocNum,
                    "o_i_t_m_id" => $newData->id,
                    "ObjType" => 33,

                ]);

                (new RisksServices())->createInherentConsequence($newRiskEvent->id);
                (new DocumentsService())->updateNumbering(33);
            }

            (new DocumentsService())->updateNumbering($request['ObjType']);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Created Successfully");
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
        try {
            $data = OITM::with('opportunities.supervisor')->where('id', $id)->first();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
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
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
            'ObjType' => 'required|integer',
            'CorporateRiskID' => (isset($request->PageTitle) && ($request->PageTitle !== 'rc-scales')) ? 'required' : 'nullable'
        ], [
            'Name.required' =>  '* Name should be required.',
            'Name.string'   =>  '* Name text should be string.',
            'Name.min'      =>  '* Name length should not be less than 4 character.',
            'Name.max'      =>  '* Name length should not be greater than 191 character.',
            'ObjType.required'  =>  '* ObjType should be required.',
            'ObjType.integer'   =>  '* ObjType should be in Integer.',
            'CorporateRiskID.required'  =>  '* corporate Risk should be required.',
        ]);

        $user = Auth::user();
        if ($request['ObjType'] == 7 || $request['ObjType'] == 8 || $request['ObjType'] == 9) {
            $this->validate($request, [
                'CategoryID' => 'required|integer',
            ]);
        }

        $fileName = null;
        if ($request['ObjType'] == 26) {
            $this->validate($request, [
                'records' => 'required|mimes:pdf|max:2048',
            ]);
            $fileName = time() . '.' . $request->records->getClientOriginalExtension();
            $request->records->storeAs('files', $fileName);
        }
        $data = OITM::where('Name', $request['Name'])
            ->where('ObjType', $request['ObjType'])->where('id','!=', $id)
            ->first();
        if ($data) {
            return (new ApiResponseService())->apiFailedResponseService("Already Exist");
        }

        DB::beginTransaction();
        try {
            $data = [
                "Name"          =>  $request['Name'],
                "ObjType"       =>  $request['ObjType'],
                "BunitID"       =>  $request['BunitID'] ?? null,
                "description"   =>  $request['description'],
                "CategoryID"    =>  $request['CategoryID'],
                "CorporateRiskID"   =>  $request['CorporateRiskID'],
                "RiskLevelID"   =>  $request['RiskLevelID'],
                "parent_id"     =>  $request['parent_id'] ?? null,
                "o_r_i_s_k_id"  =>  $request['o_r_i_s_k_id'] ?? null,
                "file_path"     =>  $fileName,
            ];
            $newData = OITM::where('id', $id)->update($data);

            if ($request['ObjType'] == 32) {
                $DocNum = (new DocumentsService())->documentNumembering(33);
                $newRiskEvent = ORISK::where("o_i_t_m_id", $id)->update([
                    'BunitID' => $user->BunitID,
                    'DocNum' => $DocNum,
                    "ObjType" => 33,
                ]);

                // (new RisksServices())->createInherentConsequence($newRiskEvent->id);
                // (new DocumentsService())->updateNumbering(33);
            }

            // (new DocumentsService())->updateNumbering($request['ObjType']);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable$th) {
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
        try {
            $bunit = OITM::findOrFail($id);
            $bunit->delete();
            return (new ApiResponseService())->apiSuccessResponseService("Deleted Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get Causes and Effects
     */
    public function getCausesEffects()
    {
        $RiskID = \Request::get('RiskID');
        $isForAction = \Request::get('isForAction');
        $isCRM = \Request::get('isCRM');
        $actionID = \Request::get('action_id');

        try {

            //Events
            $events = OITM::where('ObjType', 8)->get();

            //Causes
            $causes = OITM::where('ObjType', 7)->get();
            if ($isForAction && !$isCRM) {
                $causes = OITM::with('risk1')
                    ->whereHas('risk1', function ($q) use ($RiskID) {
                        $q->where('o_r_i_s_k_id', $RiskID);
                    })
                    ->where('ObjType', 7)->get();
                if ($actionID) {

                    $causes = OITM::with('risk1', 'risk3')
                        ->whereHas('risk1', function ($q) use ($RiskID) {
                            $q->where('o_r_i_s_k_id', $RiskID);
                        })
                        ->whereHas('risk3', function ($q) use ($actionID) {
                            $q->where('action_tracking_id', $actionID);
                        })
                        ->where('ObjType', 7)->get();

                    foreach ($causes as $key => $value) {
                        $value->isSelected = false;
                        $check = RISK3::where('action_tracking_id', $actionID)
                            ->where('o_i_t_m_id', $value->id)->first();
                        if ($check) {
                            $value->isSelected = true;
                        }
                    }
                }

                $users = User::get();
                foreach ($users as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK4::where('action_tracking_id', $actionID)
                        ->where('user_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }

                }

                $data = [
                    'users' => $users,
                    'causes' => $causes,
                ];
                return (new ApiResponseService())
                    ->apiSuccessResponseService($data);
            }

            //Causes
            $methods = OITM::where('ObjType', 34)->get();
            if ($isForAction && $isCRM) {
                $methods = OITM::with('risk1')
                    ->whereHas('risk1', function ($q) use ($RiskID) {
                        $q->where('o_r_i_s_k_id', $RiskID);
                    })
                    ->where('ObjType', 34)->get();
                if ($actionID) {

                    $methods = OITM::with('risk1', 'risk3')
                        ->whereHas('risk1', function ($q) use ($RiskID) {
                            $q->where('o_r_i_s_k_id', $RiskID);
                        })
                        ->whereHas('risk3', function ($q) use ($actionID) {
                            $q->where('action_tracking_id', $actionID);
                        })
                        ->where('ObjType', 34)->get();

                    foreach ($methods as $key => $value) {
                        $value->isSelected = false;
                        $check = RISK3::where('action_tracking_id', $actionID)
                            ->where('o_i_t_m_id', $value->id)->first();
                        if ($check) {
                            $value->isSelected = true;
                        }
                    }
                }

                $users = User::get();
                foreach ($users as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK4::where('action_tracking_id', $actionID)
                        ->where('user_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }

                }

                $data = [
                    'users' => $users,
                    'methods' => $methods,
                ];
                return (new ApiResponseService())
                    ->apiSuccessResponseService($data);
            }

            if ($RiskID) {
                foreach ($causes as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                    if ($check) {

                        $value->isSelected = true;
                    }
                }
            }

            //effects
            $effects = OITM::where('ObjType', 9)->get();
            if ($RiskID) {
                foreach ($effects as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }

            //control items
            $controlitems = OITM::where('ObjType', 16)->get();
            if ($RiskID) {
                foreach ($controlitems as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }

            $riskmethods = OITM::where('ObjType', 34)->get();
            if ($RiskID) {
                foreach ($riskmethods as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }

            $data = [
                'events' => $events,
                'causes' => $causes,
                'effects' => $effects,
                'methods' => $riskmethods,
                'controlitems' => $controlitems,
            ];
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    public function getRiskCauses()
    {
        $RiskID = \Request::get('RiskID');
        $ObjType = \Request::get('ObjType');

        try {

            $data = OITM::where('ObjType', $ObjType)->paginate(5);
            if ($RiskID) {
                foreach ($data as $key => $value) {
                    $value->isSelected = false;
                    $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                    if ($check) {
                        $value->isSelected = true;
                    }
                }
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function findCauseOrImpact()
    {

        $ObjType = \Request::get('ObjType');
        $RiskID = \Request::get('RiskID');
        $user = Auth::user();

        if ($search = \Request::get('q')) {

            try {

                $data = OITM::where('ObjType', $ObjType)
                    ->where(function ($q) use ($search) {
                        $q->orwhere('Name', 'LIKE', "%$search%");
                    })
                    ->paginate(5);
                if ($RiskID) {
                    foreach ($data as $key => $value) {
                        $value->isSelected = false;
                        $check = RISK1::where('o_r_i_s_k_id', $RiskID)->where('o_i_t_m_id', $value->id)->first();
                        if ($check) {
                            $value->isSelected = true;
                        }
                    }
                }

                return (new ApiResponseService())
                    ->apiSuccessResponseService($data);
            } catch (\Throwable$th) {
                return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
            }
        }
    }

    public function getLevelCausesEffects(Request $request)
    {
        $RiskID = \Request::get('RiskID');
        $ObjType = \Request::get('ObjType');

        try {
            $allLevelOneRisks = RISK5::where('parent', $RiskID)->pluck('o_r_i_s_k_id');
            $data = ORISK::with('item')->whereIn('o_i_t_m_id', $allLevelOneRisks)->get();

            foreach ($data as $key => $val) {
                $val->expand = false;
                $val->items = OITM::with('risk1')->
                    where('ObjType', $ObjType)
                    ->whereHas('risk1', function ($q) use ($val) {
                        $q->where('o_r_i_s_k_id', $val->id);
                    })->get();
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    public function getKRIComplianceERM()
    {

        $RiskID = \Request::get('RiskID');
        $ObjType = \Request::get('ObjType');
        try {
            $allLevelOneRisks = RISK5::where('parent', $RiskID)->pluck('o_r_i_s_k_id');

            $data = ORISK::with('item')->whereIn('id', $allLevelOneRisks)->get();

            foreach ($data as $key => $val) {
                $val->expand = false;
                $val->items = OKRI::where('ObjType', $ObjType)
                    ->where('o_i_t_m_id', $val->o_i_t_m_id)
                    ->orderBy('Frequency')
                    ->get();
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    public function syncQMSRelationship()
    {
        $RiskID = \Request::get('RiskID');
        $ItemID = \Request::get('ItemID');

        $isSelected = \Request::get('isSelected');
        $ObjType = \Request::get('ObjType');

        $item = OITM::where('id', $RiskID)->first();

        $isTrue = filter_var($isSelected, FILTER_VALIDATE_BOOLEAN);
        if ($isTrue) {
            $item->qmsrisks()->attach($ItemID, ['ObjType' => $ObjType]);
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        }
        $item->qmsrisks()->detach($ItemID);
        return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");

    }

    public function getRiskMethods()
    {

        $ObjType = \Request::get('ObjType');
        $RiskID = \Request::get('RiskID');

        try {
            $data = OITM::with('category')->where('ObjType', $ObjType)
                ->where('o_r_i_s_k_id', $RiskID)
                ->get();

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get Functional Aread Data
     */

    public function getFunctionalAreaData()
    {
        $ObjType = \Request::get('ObjType');
        $BunitID = \Request::get('BunitID');
        $fraudRiskID = \Request::get('fraudRiskID');

        $dataObjects = [30];
        $FUNCTIOANAL_AREA_ASSETS_OBJECT = 31;
        try {
            $fraudRiskAreas = OITM::with('category')->whereIn('ObjType', $dataObjects)
                ->where('parent_id', $fraudRiskID)
                ->get();

            $assets = OITM::with('category')->where('ObjType', $FUNCTIOANAL_AREA_ASSETS_OBJECT)
                ->pluck('Name')->toArray();

            foreach ($fraudRiskAreas as $key => $value) {

                $riskEvents = OITM::where('ObjType', 32)
                    ->where('parent_id', $value->id)
                    ->pluck('id')->toArray();

                $value->assets = implode(",", $assets);

                $value->dataRisks = (new RisksServices())->getRisks(33, $riskEvents);
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($fraudRiskAreas);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
