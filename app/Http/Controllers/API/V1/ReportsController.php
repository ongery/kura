<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BUNIT;
use App\Models\Incident;
use App\Models\ORISK;
use App\Models\OITM;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\AuthHelperService;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\CorruptionManagementModuleService;
use App\Services\Transactions\KeyRiskIndicatorService;
use App\Services\Transactions\RisksServices;
use App\Services\Transactions\StratetegicModuleService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ReportsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riskRegister()
    {
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

            foreach ($allBusinessUnits as $key => $value) {
                $value->riskRegisterData = (new RisksServices())->getRiskRegisterData($value->id);
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get ERM Register
     */

    public function ermRegister()
    {
        try {
            $allBusinessUnits = (new RisksServices())->getERMData();
            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get KRI Register
     */

    public function kriRegister()
    {
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

            $totalRedKRIS = 0;
            $totalAmberKRIs = 0;

            foreach ($allBusinessUnits as $key => $value) {

                $riskRegisterData = (new RisksServices())->getKeyRiskIndicatorRegisterData(1, $value->id);

                $addedColorRegisterData = [];
                foreach ($riskRegisterData as $key => $kri) {

                    $colorCodes = (new DocumentsService())->determineKRIValue($kri['o_k_r_i_id'], $kri['user_id']);

                    $color = [
                        "color" => $colorCodes->color,
                    ];

                    $newArray = array_merge($kri, $color);

                    array_push($addedColorRegisterData, $newArray);
                }

                $value->riskRegisterData = $addedColorRegisterData;

            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Get KCI Register
     */

    public function kciRegister()
    {
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

            foreach ($allBusinessUnits as $key => $value) {

                $value->riskRegisterData = (new RisksServices())->getKeyRiskIndicatorRegisterData(2, $value->id);
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function qmsRegister()
    {
        $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
        $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

        foreach ($allBusinessUnits as $key => $value) {

            $value->procedureData = (new RisksServices())->getQmsRegisterData($value->id);

        }

        return (new ApiResponseService())
            ->apiSuccessResponseService($allBusinessUnits);
    }

    /**
     *
     */

    public function qmsIncident()
    {
        try {
            $data = Incident::with('creator')->latest()->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Action Register
     */

    public function actionRegister()
    {

        $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
        $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

        foreach ($allBusinessUnits as $key => $value) {
            $value->actionData = (new RisksServices())->getTreatmentPlans($value->id);
        }

        return (new ApiResponseService())
            ->apiSuccessResponseService($allBusinessUnits);
    }

    public function kriRegisterSummary()
    {

        $KRI_OBJECT_TYPE = 17;

        $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();

        try {

            $bRisks = ORISK::whereIn('BunitID', $businessUnitIds)->where('ObjType', 11)->get();

            $totalKRIs = 0;
            $redKRIs = 0;
            $amberKRIs = 0;
            $greenKRIs = 0;
            $unMeteredKRIs = 0;
            foreach ($bRisks as $key => $riskValue) {

                $totalRiskKRIs = (new DocumentsService())->getTotalKRIOrKCI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
                $KRIORKCIDATA = (new KeyRiskIndicatorService())->getRedOrNonComplinaceKCIORKRI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id);

                $redKRIs = $redKRIs + $KRIORKCIDATA['totalRed'];
                $amberKRIs = $amberKRIs + $KRIORKCIDATA['totalAmber'];
                $greenKRIs = $greenKRIs + $KRIORKCIDATA['totalGreen'];
                $unMeteredKRIs = $unMeteredKRIs = $KRIORKCIDATA['totalUnmetered'];
                $totalKRIs = $totalKRIs + $totalRiskKRIs;
            }

            $data = [
                "totalRisks" => count($bRisks),
                "totalKRIs" => $totalKRIs,
                "redKRIs" => $redKRIs,
                "amberKRIs" => $amberKRIs,
                "greenKRIs" => $greenKRIs,
                "unMeteredKRIs" => $unMeteredKRIs,
            ];

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Register Summary
     */
    public function kciRegisterSummary()
    {
        $KCI_OBJECT_TYPE = 20;

        $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();

        try {

            $bRisks = ORISK::whereIn('BunitID', $businessUnitIds)->where('ObjType', 11)->get();

            $totalKRIs = 0;
            $redKRIs = 0;
            $greenKRIs = 0;
            $unMeteredKRIs = 0;
            foreach ($bRisks as $key => $riskValue) {

                $totalRiskKRIs = (new DocumentsService())->getTotalKRIOrKCI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id);
                $KRIORKCIDATA = (new KeyRiskIndicatorService())->getRedOrNonComplinaceKCIORKRI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id);

                $redKRIs = $redKRIs + $KRIORKCIDATA['totalRedKCIs'];
                $greenKRIs = $greenKRIs + $KRIORKCIDATA['totalGreenKCIs'];
                $unMeteredKRIs = $unMeteredKRIs + $KRIORKCIDATA['totalunMeteredKCIs'];
                $totalKRIs = $totalKRIs + $totalRiskKRIs;
            }
            $data = [
                "totalRisks" => count($bRisks),
                "totalKCIs" => $totalKRIs,
                "redKCIs" => $redKRIs,
                "greenKCIs" => $greenKRIs,
                "unAttestedKCI" => $unMeteredKRIs,
            ];
            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            dd($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function cmrRegister()
    {
        try {
            $allBusinessUnits = (new CorruptionManagementModuleService())->prepareCRAreport();

            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function strategicRegister()
    {
        try {
            $allBusinessUnits = (new StratetegicModuleService)->prepareStrategicreport();

            return (new ApiResponseService())
                ->apiSuccessResponseService($allBusinessUnits);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    // KRI VISUALIZATION
    public function getKRIVisualization ()
    {
        $kriLabels = [];
        $kriDatas = [];
        $kriColors = [];
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

            // GET LIST OF DEFAULT COLORS ARRAY
            $bgColorArr = self::defaultChartColors();
            foreach ($allBusinessUnits as $key => $value) {
                $riskRegisterData = (new RisksServices())->getKeyRiskIndicatorRegisterData(1, $value->id);
                foreach ($riskRegisterData as $key => $kri) {
                    $bgColor = $bgColorArr[array_rand($bgColorArr)];
                    if( (!in_array($kri['KRIitems'], $kriLabels)) && !empty($kri['KRIitems']) ) {
                        array_push($kriLabels, Str::limit($kri['KRIitems'], 20));
                        array_push($kriDatas, $kri['ResidualValue']);

                        if(!in_array($bgColor, $kriColors)) {
                            array_push($kriColors, $bgColor);
                        }
                    }
                }
            }

            $data = array('labels' => $kriLabels, 'datas' => $kriDatas, 'bgColors' => $kriColors);
            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
  
    // KRIT VISUALIZATION
    public function getKRITVisualization ()
    {
        $kritLabels = [];
        $kritDatas = [];
        $kritColors = [];
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();

            // GET LIST OF DEFAULT COLORS ARRAY
            $bgColorArr = self::defaultChartColors();
            foreach ($allBusinessUnits as $key => $value) {
                $riskRegisterData = (new RisksServices())->getKeyRiskIndicatorRegisterData(2, $value->id);
                foreach ($riskRegisterData as $key => $krit) {
                    $bgColor = $bgColorArr[array_rand($bgColorArr)];
                    if( (!in_array($krit['KRIitems'], $kritLabels)) && !empty($krit['KRIitems']) ) {
                        array_push($kritLabels, Str::limit($krit['KRIitems'], 20));
                        array_push($kritDatas, $krit['ResidualValue']);

                        if(!in_array($bgColor, $kritColors)) {
                            array_push($kritColors, $bgColor);
                        }
                    }
                }
            }

            $data = array('labels' => $kritLabels, 'datas' => $kritDatas, 'bgColors' => $kritColors);
            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    // RISK EVENTS VISUALIZATION
    public function getRiskEventsVisualization ()
    {
        $BunitID = \Request::get('BunitID');
        $RELabels = [];
        $REDatas = [];
        $REColors = [];
        try {
            $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            $data = OITM::with('category')->select('id','Name','DocNum','ObjType','description','RiskLevelID')->where('ObjType', "22")
                ->where(function ($q) use ($BunitID) {
                    if ($BunitID) {
                        $q->where('BunitID', $BunitID);
                    }
                })->get();

            // GET LIST OF DEFAULT COLORS ARRAY
            $bgColorArr = self::defaultChartColors();

            foreach ($data as $key => $dt) {
                $calcRisk = 0;
                $orisk = ORISK::with('ilikelihoodscale', 'rlikelihoodscale')->where('o_i_t_m_id', $dt->id)->first();
                if(!empty($orisk)) {
                    $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($orisk->id, 24);

                    $il = 0;
                    if ($orisk->ilikelihoodscale) {
                        $il = $orisk->ilikelihoodscale->Base;
                    }
                    $ir = $ic * $il;

                    $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($orisk->id, 25);

                    $rl = $orisk->rlikelihoodscale ? $orisk->rlikelihoodscale->Base : 0;

                    $cc = 0;
                    if ($ic > 0) {
                        $cc = number_format((($ic - $rc) / $ic) * 100, 0);
                    }

                    $lc = 0;
                    if ($il > 0) {
                        $lc = number_format((($il - $rl) / $il) * 100, 0);
                    }

                    $rr = $rc * $rl;
                    $calcRisk = $ic + $il + $ir + $cc + $lc + $rc + $rl + $rr; 
                }

                $bgColor = $bgColorArr[array_rand($bgColorArr)];
                if( (!in_array($dt->Name, $RELabels)) && !empty($dt->Name) ) {
                    array_push($RELabels, Str::limit($dt->Name, 20));
                    array_push($REDatas, $calcRisk);
                    
                    if(!in_array($bgColor, $REColors)) {
                        array_push($REColors, $bgColor);
                    }
                }
            }

            $data = array('labels' => $RELabels, 'datas' => $REDatas, 'bgColors' => $REColors);
            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
  
    private function defaultChartColors()
    {
        return [
            'rgba(0, 191, 111, 1)',
            'rgba(80, 124, 182, 1)',
            'rgba(249, 190, 0, 1)',
            'rgba(107, 200, 205, 1)',
            'rgba(255, 139, 79, 1)',
            'rgba(125, 94, 144, 1)',
            'rgba(210, 95, 144, 1)',
            'rgba(199, 184, 121, 1)',
            'rgba(219, 77, 92, 1)',
            'rgba(118, 128, 134, 1)',
            'rgba(245, 40, 145, 0.8)',
            'rgba(0, 0, 0, 0.5)',
            'rgb(166, 147, 94)',
            'rgb(112, 95, 46)',
            'rgb(189, 86, 34)',
            'rgb(204, 64, 49)',
            'rgb(69, 110, 22)',
        ];
    }
}
