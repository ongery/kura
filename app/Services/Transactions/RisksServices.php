<?php

namespace App\Services\Transactions;

use App\Models\ActionTracking;
use App\Models\BUNIT;
use App\Models\ITM1;
use App\Models\KRI1;
use App\Models\OITM;
use App\Models\OKRI;
use App\Models\ORISK;
use App\Models\RISK1;
use App\Models\RISK2;
use App\Models\RISK5;
use App\Models\User;
use App\Services\Shared\ArrayFormatingService;
use App\Services\Shared\DocumentsService;
use App\Models\ConsequenceMatrixRank;

/**
 * Service for Marke
 */
class RisksServices
{
    /**
     *  Create Inherent Consequence
     * @return \Illuminate\Http\Response
     */
    public function createInherentConsequence($RiskID)
    {
        $items = OITM::where('ObjType', 10)->get();

        foreach ($items as $key => $value) {

            RISK2::updateOrCreate([
                'ObjType' => 24, //Inherent Consequence Scale
                "o_r_i_s_k_id" => $RiskID,
                "o_i_t_m_id" => $value->id,
            ]);

            RISK2::updateOrCreate([
                'ObjType' => 25, //Residual Consequence Scale
                "o_r_i_s_k_id" => $RiskID,
                "o_i_t_m_id" => $value->id,
            ]);
        }
    }
    /**
     *  Create Inherent Consequence
     * @return \Illuminate\Http\Response
     */
    public function addScaleGroupToRisk($ItemCode)
    {
        $items = ORISK::get();

        foreach ($items as $key => $value) {
            RISK2::updateOrCreate([
                "o_r_i_s_k_id" => $value->id,
                "o_i_t_m_id" => $ItemCode,
            ]);
        }
    }

    /**
     *  Getting Inherent Consequence Scale
     * @return \Illuminate\Http\Response
     */
    public function calculateInherentConsequenceScale(int $riskID, int $ObjType): int
    {
        $risk2 = RISK2::where('o_r_i_s_k_id', $riskID)
            ->where('ObjType', $ObjType)
            ->get();
        if ($risk2->isEmpty()) {
            return 0;
        }

        foreach ($risk2 as $key => $value) {
            $itm1 = ITM1::where('id', $value->i_t_m_1_id)->first();
            $value->Base = 0;
            if ($itm1) {
                $value->Base = $itm1->Base;
            }
        }

        $sorted = $risk2->SortByDesc('Base');

        foreach ($sorted as $key => $value) {
            return $value['Base'];
        }
    }


    /**
     *  Getting Inherent Consequence Scale
     * @return \Illuminate\Http\Response
     */
    /*public function calculateInherentConsequenceMatrixScale(int $oitmId): int
    {
        $risk2 = ConsequenceMatrixRank::where('o_r_i_s_k_id', $riskID)
            ->where('ObjType', $ObjType)
            ->get();
        if ($risk2->isEmpty()) {
            return 0;
        }

        foreach ($risk2 as $key => $value) {
            $itm1 = ITM1::where('id', $value->i_t_m_1_id)->first();
            $value->Base = 0;
            if ($itm1) {
                $value->Base = $itm1->Base;
            }
        }

        $sorted = $risk2->SortByDesc('Base');

        foreach ($sorted as $key => $value) {
            return $value['Base'];
        }
    }*/

    public function getRisks(int $ObjType, array $riskEventsIds = null)
    {
        $data = ORISK::with('ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale', 'item')
            ->where('ObjType', $ObjType)
            ->whereIn('o_i_t_m_id', $riskEventsIds)
            ->get();
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

            $value->RiskName = $value->item->Name;
            $value->Treatments = (new RisksServices())->getRiskTreatmnet($value->id);
        }

        return $data;
    }

    /**
     *  GET CAUSES OR EFFECTS OR CONTROL ITEMS FOR SPECIFIC RISK
     *  @param int @ObjType   RISK CAUSES = 7 , EFFECTS/IMPACTS = 9,CONTROL ITEMS = 16;
     *  @param int @riskID    Risk Event ID
     */

    public function getCausesOrEffectsOrControlItemsForRisk(int $ObjType, int $riskID)
    {

        $riskRelatedData = RISK1::with('item')->where('o_r_i_s_k_id', $riskID)
            ->where('ObjType', $ObjType)
            ->get();

        $allData = [];
        foreach ($riskRelatedData as $key => $riskValue) {
            $riskValue->RiskName = 0;
            $riskValue->RiskSourceName = $riskValue->item ? $riskValue->item->Name : 'N/A'; // Handle null item
            $riskValue->InherentValue = 0;
            $riskValue->ResidualValue = 0;
            $riskValue->TotalQuestions = 0;
            $riskValue->NonCompliance = 9;
            $riskValue->TotalKRIs = 0;
            $riskValue->RedKRIs = 9;

            array_push($allData, $riskValue);
        }
        return $allData;
    }

    /**
     *  GET TOTAL KRI OR KC1 RELATED TO RISK
     *
     *  @param int @ObjType   KCI = 20 , KRI = 17;
     *  @param int @riskID    Risk Event ID
     */
    public function getAllKRIOrKCI($ObjType, $riskID)
    {
        $riskRelatedData = OKRI::with('kri1')->where('ObjType', $ObjType)
            ->where('o_i_t_m_id', $riskID)
            ->get();

        $allData = [];
        foreach ($riskRelatedData as $key => $riskValue) {

            $riskValue->RiskName = 0;
            $riskValue->RiskSourceName = $riskValue->Name;
            $riskValue->InherentValue = 0;
            $riskValue->ResidualValue = 0;
            $riskValue->TotalQuestions = 0;
            $riskValue->NonCompliance = 9;
            $riskValue->TotalKRIs = 0;
            $riskValue->RedKRIs = 9;
            $riskValue->Frequency = $riskValue->freq;

            $kri1Items = KRI1::with('user')->where('o_k_r_i_id', $riskValue->id)->get();

            $actionsItems = ActionTracking::where('o_k_r_i_id', $riskValue->id)->get();
            $assignedUsers = [];
            $allActionsItems = [];

            foreach ($kri1Items as $key => $val) {
                $user = User::where('id', $val->user_id)->first();

                $details = [
                    "user_id" => $user->id,
                    "user" => $user->full_name,
                    "value" => $val->Value,
                    "o_k_r_i_id" => $val->id,
                ];
                array_push($assignedUsers, $details);
            }

            foreach ($actionsItems as $key => $val) {

                $details = [
                    "actionName" => $val->Name,
                    "actionStatus" => $val->freq,
                ];
                array_push($allActionsItems, $details);
            }

            $riskValue->assignedUsers = $assignedUsers;
            $riskValue->actionItems = $allActionsItems;
            array_push($allData, $riskValue);
        }
        return $allData;
    }

    /**
     *  GET RISK TREATMEN PLANT
     *
     *  @param int @riskID    Risk Event ID
     */
    public function getRiskTreatmnet(int $riskID)
    {

        $CRM_ACTIVITY_OBJTYPE = 42;
        $riskRelatedData = ActionTracking::where('o_r_i_s_k_id', $riskID)
            ->where('ObjType', '!=', $CRM_ACTIVITY_OBJTYPE)
            ->get();

        $allData = [];
        foreach ($riskRelatedData as $key => $riskValue) {
            $riskValue->RiskName = 0;
            $riskValue->RiskSourceName = $riskValue->Name;
            $riskValue->InherentValue = 0;
            $riskValue->ResidualValue = 0;
            $riskValue->TotalQuestions = 0;
            $riskValue->NonCompliance = 9;
            $riskValue->TotalKRIs = 0;
            $riskValue->RedKRIs = 9;
            $riskValue->actionStatus = $riskValue->freq;

            //Get Activities

            $riskValue->activities = ActionTracking::with('activityusers')->where('parent_id', $riskValue->id)
                ->where('ObjType', $CRM_ACTIVITY_OBJTYPE)
                ->get()->toArray();

            array_push($allData, $riskValue);
        }
        return $allData;
    }

    /**
     *  PREPARE ARRAY DATA
     *
     */
    public function getRiskRegisterData(int $businessUnit = null)
    {

            $KCI_OBJECT_TYPE = 20;
            $KRI_OBJECT_TYPE = 17;

            $allData = [];


            $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
                ->where(function ($q) use ($businessUnit) {
                    if ($businessUnit) {
                        $q->where('BunitID', $businessUnit);
                    }
                    if (!$businessUnit) {
                        $allBusinessUnits = BUNIT::pluck('id');
                        $q->whereIn('BunitID', $allBusinessUnits);
                    }
                })
                ->where('ObjType', 11)->get();

         

            // Iterate All Data fetched ()
            foreach ($bRisks as $key => $riskValue) {

                $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 24);
                $il = 0;
                if ($riskValue->ilikelihoodscale) {
                    $il = $riskValue->ilikelihoodscale->Base;
                }
                $InherentValue = $ic * $il > 0 ? $ic * $il : null;

                /**
                 * TOTAL CCI1
                 */

                //R.C
                $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 25);

                //R.L
                $rl = $riskValue->rlikelihoodscale ? $riskValue->rlikelihoodscale->Base : 0;

                $ResidualValue = ($rc * $rl) > 0 ? $rc * $rl : null;

                // set val data (Defaults)
                #$riskValue->RiskName = $riskValue->item->Name;
                $riskValue->RiskName = $riskValue->item ? $riskValue->item->Name : 'N/A';
                $riskValue->InherentValue = $InherentValue ?? null;
                $riskValue->ResidualValue = $ResidualValue ?? null;
                $riskValue->NonCompliance = 9;
                $riskValue->RedKRIs = 9;
                $riskValue->NotStartedOverdue = 1;
                $riskValue->WIPOverdue = 9;

                $riskSources = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(7, $riskValue->id);
                $riskImpacts = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(9, $riskValue->id);
                $controlItems = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(16, $riskValue->id);

                $kciItems = (new RisksServices())->getAllKRIOrKCI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
                $kriItems = (new RisksServices())->getAllKRIOrKCI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
                $treatmentPlans = (new RisksServices())->getRiskTreatmnet($riskValue->id);

                $allRiskSource = [];
                $allRiskImpacts = [];
                $allControlItems = [];
                $allKCIItems = [];
                $allKRIItems = [];
                $allTreatmentPlans = [];

                // Add  to Arrays
                foreach ($riskSources as $key => $value) {
                    array_push($allRiskSource, $value);
                }

                foreach ($riskImpacts as $key => $value) {
                    array_push($allRiskImpacts, $value);
                }

                foreach ($controlItems as $key => $value) {
                    array_push($allControlItems, $value);
                }

                foreach ($kciItems as $key => $value) {
                    array_push($allKCIItems, $value);
                }

                foreach ($kriItems as $key => $value) {
                    array_push($allKRIItems, $value);
                }

                foreach ($treatmentPlans as $key => $value) {
                    array_push($allTreatmentPlans, $value);
                }

                // set val data (Actual Data)
                $riskValue->RiskSource = $allRiskSource;
                $riskValue->RiskImpacts = $allRiskImpacts;
                $riskValue->ControlItems = $allControlItems;
                $riskValue->KCIItems = $allKCIItems;
                $riskValue->KRIItems = $allKRIItems;
                $riskValue->Treatments = $allTreatmentPlans;
                array_push($allData, $riskValue);
            }

            // Set current variable
            $result = $allData;

            // Init Data vars
            $newArr = [];
            $arr = [];

            foreach ($result as $key => $value) {

                $count = [
                    count($value['RiskSource']),
                    count($value['RiskImpacts']),
                    count($value['ControlItems']),
                    count($value['KCIItems']),
                    count($value['KRIItems']),
                    count($value['Treatments']),

                ];


                // for
                $arrMax = max($count);

                if ($arrMax > 0) {


                    for ($i = 0; $i < $arrMax; $i++) {
                        $arrIndex = $i;
                        $arr['Count'] = '';
                        $arr['RiskName'] = '';

                        if ($arrIndex == '0') {

                            $arr['Count'] = $key + 1;
                            $arr['RiskName'] = isset($value['RiskName']) ? $value['RiskName'] : '';
                            $arr['RiskSource'] = '';
                            $arr['RiskImpact'] = '';
                            $arr['InherentValue'] = $arrIndex == '0' ? $value['InherentValue'] : '';
                            $arr['ControlItems'] = '';
                            $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                            $arr['KCIitems'] = '';
                            $arr['KRIitems'] = '';
                            $arr['TreatmentsPlans'] = '';
                        }


                        $arr['RiskSource'] = isset($value['RiskSource'][$arrIndex]['RiskSourceName']) ? $value['RiskSource'][$arrIndex]['RiskSourceName'] : '';
                        $arr['RiskImpact'] = isset($value['RiskImpacts'][$arrIndex]['RiskSourceName']) ? $value['RiskImpacts'][$arrIndex]['RiskSourceName'] : '';
                        $arr['InherentValue'] = $arrIndex == '0' ? $value['InherentValue'] : '';
                        $arr['ControlItems'] = isset($value['ControlItems'][$arrIndex]['RiskSourceName']) ? $value['ControlItems'][$arrIndex]['RiskSourceName'] : '';
                        $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                        $arr['KCIitems'] = isset($value['KCIItems'][$arrIndex]['RiskSourceName']) ? $value['KCIItems'][$arrIndex]['RiskSourceName'] : '';
                        $arr['KRIitems'] = isset($value['KRIItems'][$arrIndex]['RiskSourceName']) ? $value['KRIItems'][$arrIndex]['RiskSourceName'] : '';
                        $arr['TreatmentsPlans'] = isset($value['Treatments'][$arrIndex]['RiskSourceName']) ? $value['Treatments'][$arrIndex]['RiskSourceName'] : '';
                        $newArr[] = $arr;
                    }

                } else {
                    // With no Data
                    $arr['Count'] = $key + 1;
                    $arr['RiskName'] = isset($value['RiskName']) ? $value['RiskName'] : '';
                    $arr['RiskSource'] = '';
                    $arr['RiskImpact'] = '';
                    $arr['InherentValue'] = '';
                    $arr['ControlItems'] = '';
                    $arr['ResidualValue'] = '';
                    $arr['KCIitems'] = '';
                    $arr['KRIitems'] = '';
                    $arr['TreatmentsPlans'] = '';
                    $newArr[] = $arr;
                }
            }

        return $newArr;
    }

    /**
     *  PREPARE ARRAY DATA
     *
     *  @param int $withType  0= wITH Both KCI AND KRI, 1=With Only KRI, 2=With Only KCI
     *
     */
    public function getKeyRiskIndicatorRegisterData(int $withType, int $businessUnit = null)
    {

        if ($withType == 1) {
            //Use KRI Object
            $KRI_OR_KCI_OBJECT_TYPE = 17;
        }

        if ($withType == 2) {
            //Use KCI Object
            $KRI_OR_KCI_OBJECT_TYPE = 20;
        }

        $allData = [];
        $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
            ->where(function ($q) use ($businessUnit) {
                if ($businessUnit) {
                    $q->where('BunitID', $businessUnit);
                }
                if (!$businessUnit) {
                    $allBusinessUnits = BUNIT::pluck('id');
                    $q->whereIn('BunitID', $allBusinessUnits);
                }
            })
            ->where('ObjType', 11)->get();

        foreach ($bRisks as $key => $riskValue) {

            $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 24);
            $il = 0;
            if ($riskValue->ilikelihoodscale) {
                $il = $riskValue->ilikelihoodscale->Base;
            }
            $InherentValue = $ic * $il > 0 ? $ic * $il : "0";

            /**
             * TOTAL CCI1
             */

            //R.C
            $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 25);
            //R.L
            $rl = $riskValue->rlikelihoodscale ? $riskValue->rlikelihoodscale->Base : 0;

            $ResidualValue = ($rc * $rl) > 0 ? $rc * $rl : null;

           # $riskValue->RiskName = $riskValue->item->Name;
            $riskValue->RiskName = $riskValue->item ? $riskValue->item->Name : 'N/A';

            $riskValue->ResidualValue = $ResidualValue ?? null;

            $kriItems = (new RisksServices())->getAllKRIOrKCI($KRI_OR_KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id);

            $allRiskSource = [];
            $allKRIItems = [];

            foreach ($kriItems as $key => $value) {
                array_push($allKRIItems, $value);
            }

            $riskValue->RiskSource = $allRiskSource;

            $riskValue->KRIItems = $allKRIItems;

            array_push($allData, $riskValue);
        }

        $result = $allData;

        $newArr = [];
        $arr = [];
        foreach ($result as $key => $value) {

            $count = [
                count($value['KRIItems']),
            ];

            $arrMax = max($count);

            if ($arrMax > 0) {
                for ($i = 0; $i < $arrMax; $i++) {

                    $arrIndex = $i;

                    $arr['Count'] = '';
                    $arr['RiskName'] = '';
                    if ($arrIndex == '0') {
                        $arr['Count'] = $key + 1;
                        $arr['RiskName'] = isset($value['RiskName']) ? $value['RiskName'] : '';
                        $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                        $arr['KRIitems'] = '';
                        $arr['Frequency'] = '';
                        $arr['Responsibility'] = '';
                        $arr['Value'] = '';
                        $arr['o_k_r_i_id'] = '';
                        $arr['user_id'] = '';
                        $arr['actionName'] = '';
                        $arr['actionStatus'] = '';
                    }

                    $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                    $arr['KRIitems'] = isset($value['KRIItems'][$arrIndex]['RiskSourceName']) ? $value['KRIItems'][$arrIndex]['RiskSourceName'] : '';
                    $arr['Frequency'] = isset($value['KRIItems'][$arrIndex]['Frequency']) ? $value['KRIItems'][$arrIndex]['Frequency'] : '';

                    //Responsibilty
                    $countLevel1 = [
                        count($value['KRIItems'][$arrIndex]['assignedUsers']),
                        count($value['KRIItems'][$arrIndex]['actionItems']),
                    ];

                    $arrMax1 = max($countLevel1);

                    if ($arrMax1 > 0) {

                        for ($j = 0; $j < $arrMax1; $j++) {

                            $arrIndex1 = $j;
                            $arr['Count'] = '';
                            $arr['RiskName'] = '';
                            $arr['ResidualValue'] = '';
                            $arr['KRIitems'] = '';
                            $arr['Frequency'] = '';

                            if ($arrIndex1 == '0') {
                                $arr['Count'] = $arrIndex == '0' ? $key + 1 : '';
                                $arr['RiskName'] = $arrIndex == '0' ? $value['RiskName'] : '';
                                $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                                $arr['KRIitems'] = isset($value['KRIItems'][$arrIndex]['RiskSourceName']) ? $value['KRIItems'][$arrIndex]['RiskSourceName'] : '';
                                $arr['Frequency'] = isset($value['KRIItems'][$arrIndex]['Frequency']) ? $value['KRIItems'][$arrIndex]['Frequency'] : '';
                                $arr['Responsibility'] = '';
                                $arr['Value'] = '';
                                $arr['o_k_r_i_id'] = '';
                                $arr['user_id'] = '';
                                $arr['actionName'] = '';
                                $arr['actionStatus'] = '';
                            }

                            $arr['Responsibility'] = isset($value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['user']) ? $value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['user'] : '';
                            $arr['Value'] = isset($value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['value']) ? $value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['value'] : '';
                            $arr['o_k_r_i_id'] = isset($value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['o_k_r_i_id']) ? $value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['o_k_r_i_id'] : '';
                            $arr['user_id'] = isset($value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['user_id']) ? $value['KRIItems'][$arrIndex]['assignedUsers'][$arrIndex1]['user_id'] : '';
                            $arr['actionName'] = isset($value['KRIItems'][$arrIndex]['actionItems'][$arrIndex1]['actionName']) ? $value['KRIItems'][$arrIndex]['actionItems'][$arrIndex1]['actionName'] : '';
                            $arr['actionStatus'] = isset($value['KRIItems'][$arrIndex]['actionItems'][$arrIndex1]['actionStatus']) ? $value['KRIItems'][$arrIndex]['actionItems'][$arrIndex1]['actionStatus'] : '';
                            $newArr[] = $arr;
                        }
                    } else {
                        $newArr[] = $arr;
                    }
                }
            } else {
                $arr['Count'] = $key + 1;
                $arr['RiskName'] = isset($value['RiskName']) ? $value['RiskName'] : '';
                $arr['ResidualValue'] = '';
                $arr['KRIitems'] = '';
                $arr['Frequency'] = '';
                $arr['Responsibility'] = '';
                $arr['Value'] = '';
                $arr['o_k_r_i_id'] = '';
                $arr['user_id'] = '';
                $arr['actionName'] = '';
                $arr['actionStatus'] = '';
                $newArr[] = $arr;
            }
        }

        return $newArr;
    }

    /**
     *  PREPARE ERM
     *
     */
    
    public function getERMData(int $businessUnit = null)
{
    $mainRiskEventObjType = 23;

    $KCI_OBJECT_TYPE = 20;
    $KRI_OBJECT_TYPE = 17;

    // Main Risk Events
    $mainRiskEventData = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
        ->where('ObjType', $mainRiskEventObjType)->get();

    $allData = [];

    foreach ($mainRiskEventData as $key => $mainRisk) {

        $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($mainRisk->id, 24);
        $il = 0;
        if ($mainRisk->ilikelihoodscale) {
            $il = $mainRisk->ilikelihoodscale->Base;
        }
        $InherentValue = $ic * $il;

        //R.C
        $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($mainRisk->id, 25);

        //R.L
        $rl = $mainRisk->rlikelihoodscale ? $mainRisk->rlikelihoodscale->Base : 0;

        $ResidualValue = $rc * $rl;

        $leverOneRiskIds = RISK5::where('parent', $mainRisk->id)->pluck('o_r_i_s_k_id');

        $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
            ->whereIn('id', $leverOneRiskIds)
            ->where('ObjType', 11)->get();

        $riskLevelOneData = [];

        foreach ($bRisks as $key => $riskValue) {
            $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 24);
            $il = 0;
            if ($riskValue->ilikelihoodscale) {
                $il = $riskValue->ilikelihoodscale->Base;
            }
            $InherentValue = $ic * $il > 0 ? $ic * $il : "0";

            //R.C
            $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 25);
            $rl = $riskValue->rlikelihoodscale ? $riskValue->rlikelihoodscale->Base : 0;

            $ResidualValue = ($rc * $rl) > 0 ? $rc * $rl : "0";

            $riskValue->RiskName = $riskValue->item ? $riskValue->item->Name : 'N/A';
            $riskValue->InherentValue = $InherentValue ?? "0";
            $riskValue->ResidualValue = $ResidualValue ?? "0";
            $riskValue->NonCompliance = 9;
            $riskValue->RedKRIs = 9;
            $riskValue->NotStartedOverdue = 1;
            $riskValue->WIPOverdue = 9;

            $riskSources = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(7, $riskValue->id);
            $riskImpacts = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(9, $riskValue->id);
            $controlItems = (new RisksServices())->getCausesOrEffectsOrControlItemsForRisk(16, $riskValue->id);
            $kciItems = (new RisksServices())->getAllKRIOrKCI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
            $kriItems = (new RisksServices())->getAllKRIOrKCI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
            $treatmentPlans = (new RisksServices())->getRiskTreatmnet($riskValue->id);

            $allRiskSource = [];
            $allRiskImpacts = [];
            $allControlItems = [];
            $allKCIItems = [];
            $allKRIItems = [];
            $allTreatmentPlans = [];

            foreach ($riskSources as $key => $value) {
                array_push($allRiskSource, $value);
            }

            foreach ($riskImpacts as $key => $value) {
                array_push($allRiskImpacts, $value);
            }

            foreach ($controlItems as $key => $value) {
                array_push($allControlItems, $value);
            }

            foreach ($kciItems as $key => $value) {
                array_push($allKCIItems, $value);
            }

            foreach ($kriItems as $key => $value) {
                array_push($allKRIItems, $value);
            }

            foreach ($treatmentPlans as $key => $value) {
                array_push($allTreatmentPlans, $value);
            }

            $riskValue->RiskSource = $allRiskSource;
            $riskValue->RiskImpacts = $allRiskImpacts;
            $riskValue->ControlItems = $allControlItems;
            $riskValue->KCIItems = $allKCIItems;
            $riskValue->KRIItems = $allKRIItems;
            $riskValue->Treatments = $allTreatmentPlans;
            array_push($riskLevelOneData, $riskValue);
        }

        $mainRisk->MainRiskName = $mainRisk->item ? $mainRisk->item->Name : 'N/A';
        $mainRisk->InherentValue = $InherentValue;
        $mainRisk->ResidualValue = $ResidualValue;
        $mainRisk->riskLevelOneData = $riskLevelOneData;

        array_push($allData, $mainRisk);
    }

    $newArray = (new ArrayFormatingService())->formatERMDataExport($allData);

    return $newArray;
}

    /**
     *
     *
     */
    public function getQmsRegisterData($businessUnit = null)
    {

        $PROCEDURE_OBJTYPE = 26;

        $procedureData = OITM::with('category')->where('ObjType', $PROCEDURE_OBJTYPE)
            ->where(function ($q) use ($businessUnit) {
                if ($businessUnit) {
                    $q->where('BunitID', $businessUnit);
                }
                if (!$businessUnit) {

                    $allBusinessUnits = BUNIT::pluck('id');
                    $q->whereIn('BunitID', $allBusinessUnits);
                }
            })
            ->get();

        $allData = [];
        foreach ($procedureData as $key => $procedure) {

            $leverOneRiskIds = RISK1::where('o_i_t_m_id', $procedure->id)->pluck('o_r_i_s_k_id');

            $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
                ->whereIn('id', $leverOneRiskIds)
                ->where('ObjType', 11)->get();

            $riskLevelOneData = [];
            foreach ($bRisks as $key => $riskValue) {
                $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 24);
                $il = 0;
                if ($riskValue->ilikelihoodscale) {
                    $il = $riskValue->ilikelihoodscale->Base;
                }
                $InherentValue = $ic * $il > 0 ? $ic * $il : "0";

                /**
                 * TOTAL CCI1
                 */

                //R.C
                $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 25);
                //R.L
                $rl = $riskValue->rlikelihoodscale ? $riskValue->rlikelihoodscale->Base : 0;

                $ResidualValue = ($rc * $rl) > 0 ? $rc * $rl : "0";

               # $riskValue->RiskName = $riskValue->item->Name;
                $riskValue->RiskName = $riskValue->item ? $riskValue->item->Name : 'N/A';
                $riskValue->InherentValue = $InherentValue ?? "0";
                $riskValue->ResidualValue = $ResidualValue ?? "0";

                $allRiskSource = [];
                $allRiskImpacts = [];
                $allControlItems = [];

                $allTreatmentPlans = [];

                $riskValue->RiskSource = $allRiskSource;
                $riskValue->RiskImpacts = $allRiskImpacts;
                $riskValue->ControlItems = $allControlItems;

                $riskValue->Treatments = $allTreatmentPlans;
                array_push($riskLevelOneData, $riskValue);
            }

            $procedure->ProcedureTitlte = $procedure->Name;
            $procedure->riskLevelOneData = $riskLevelOneData;

            array_push($allData, $procedure);
        }

        $newArray = (new ArrayFormatingService())->formatQMSDataForExport($allData);

        return $newArray;
    }

    /**
     * Get Treatment Plans
     */

    public function getTreatmentPlans($businessUnit = null)
    {

        $actionTracking = ActionTracking::with('supervisor', 'users', 'riskevent', 'riskevent.item', 'category')
            ->whereHas('riskevent', function ($q) use ($businessUnit) {

                if ($businessUnit) {
                    $q->where('BunitID', $businessUnit);
                }
                if (!$businessUnit) {
                    $allBusinessUnits = BUNIT::pluck('id');
                    $q->whereIn('BunitID', $allBusinessUnits);
                }
            })
            ->get();

        // dd($actionTracking->toArray());

        $newArray = [];
        foreach ($actionTracking as $key => $action) {

            $details = [
                "RiskName" => $action->riskevent->item->Name,
                "TreatmentPlan" => $action->Name,
                "Category" => (!empty($action->category)) ? $action->category->Name : NULL,
                "Ranking" => (new DocumentsService())->mapTreatmentPlanRanking($action->Rating),
                "Status" => $action->freq,
                "color" => $action->color,
            ];

            array_push($newArray, $details);
        }

        return $newArray;
    }

    /**
     *
     * Get
     */

    public function getDashboardSummaryReport($riskData): array
    {

        $totalRedRisks = 0;
        $totalMediumRisks = 0;
        $totalGreenRisk = 0;

        $totalRisk = 0;


    // Ensure $riskData is an array
    if (!is_array($riskData)) {
        throw new \InvalidArgumentException("riskData must be an array.");
    }
    foreach ($riskData as $key => $overRall) {
        // Ensure $overRall is an array
        if (!is_array($overRall)) {
            continue; // Skip invalid entries
        }

        $totalRisk += count($overRall);

        foreach ($overRall as $val) {
            // Ensure $val is an array and has the 'InherentValue' key
            if (!is_array($val) || !isset($val['InherentValue'])) {
                continue; // Skip invalid entries
            }

            $inherentValue = $val['InherentValue'];

            if ($inherentValue >= 1 && $inherentValue < 4) {
                $totalGreenRisk++;
            } elseif ($inherentValue >= 4 && $inherentValue < 15) {
                $totalMediumRisks++;
            } elseif ($inherentValue >= 15) {
                $totalRedRisks++;
            }
            }
        }

        $data = [
            "totalRisks" => $totalRisk,
            "totalRedRisks" => $totalRedRisks,
            "totalMediumRisks" => $totalMediumRisks,
            "totalGreenRisks" => $totalGreenRisk,
        ];

        return $data;
    }

  

    

   

}
