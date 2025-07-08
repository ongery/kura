<?php

namespace App\Http\Controllers\API\Ext;

use App\Http\Controllers\Controller;
use App\Models\BUNIT;
use App\Models\ORISK;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\AuthHelperService;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\RisksServices;
use Illuminate\Support\Facades\Log;

class PowerBIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRiskDashboard()
    {

        try {
           # $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
            #$allBusinessUnits = BUNIT::whereIn('id')->get();
           # $businessUnitIds  = BUNIT::pluck('id');
            #$allBusinessUnits = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
           # ->where('ObjType', 23)->get();

           $businessUnitIds = (new AuthHelperService())->getBusinessUnitAssigned();
           $allBusinessUnits = BUNIT::whereIn('id', $businessUnitIds)->get();


            $allRisks = [];
            foreach ($allBusinessUnits as $key => $bunit) {

                $riskData = (new DocumentsService())->preparePowerBIRiskResponse($bunit->id);

                array_push($allRisks, $riskData);

                $bunit->riskData = $riskData;
            }

            $summaryReports = (new RisksServices())->getDashboardSummaryReport($allRisks);

            $data = [
                'riskData' => $allBusinessUnits,
                'summaryReports' => $summaryReports,
            ];
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getErmDashboard()
    {

        try {

            $KCI_OBJECT_TYPE = 20;
            $KRI_OBJECT_TYPE = 17;

            $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
                ->where('ObjType', 23)->get();

            $allRisks = [];
            $count = 1;
            foreach ($bRisks as $key => $riskValue) {

                $ic = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 24);
                $il = 0;
                if ($riskValue->ilikelihoodscale) {
                    $il = $riskValue->ilikelihoodscale->Base;
                }
                $InherentValue = $ic * $il;

                /**
                 * TOTAL CCI1
                 */

                //R.C
                $rc = (int) (new RisksServices())->calculateInherentConsequenceScale($riskValue->id, 25);
                //R.L
                $rl = $riskValue->rlikelihoodscale ? $riskValue->rlikelihoodscale->Base : 0;

                $ResidualValue = $rc * $rl;

                $levelOneRiskData = (new DocumentsService())->getLevelOneRiskReportData($riskValue->id);

                $risk = [
                    "count" => $count,
                    "RiskName" => $riskValue->item->Name,
                    "InherentValue" => $InherentValue,
                    "ResidualValue" => $ResidualValue,
                    "riskData" => $levelOneRiskData,
                ];
                array_push($allRisks, $risk);
                $count += $count;
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($allRisks);
        } catch (\Throwable$th) {
            Log::info($th);
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    /**
     *
     */

    public function getKRIRegister()
    {
        return (new RisksServices())->getKeyRiskIndicatorRegisterData(1);
    }
}
