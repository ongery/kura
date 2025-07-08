<?php

namespace App\Services\Shared;

use App\Models\KRI1;
use App\Models\OKRI;
use App\Models\ONNM;
use App\Models\ORISK;
use App\Models\RISK5;
use App\Models\User;
use App\Services\Transactions\KeyRiskIndicatorService;
use App\Services\Transactions\RisksServices;
use stdClass;

/**
 * Service for Marke
 */
class DocumentsService
{
    /**
     *  Document Numbering
     * @return \Illuminate\Http\Response
     */
    public function documentNumembering($ObjType)
    {
        $nnm1 = ONNM::where('ObjType', $ObjType)->first();
        $DocNum = $nnm1->BeginStr . "-" . sprintf("%0" . $nnm1->NumSize . "s", $nnm1->NextNumber) . $nnm1->EndStr;

        return $DocNum;
    }

    public function updateNumbering($ObjType)
    {
        $nnm1 = ONNM::where('ObjType', $ObjType)->first();
        //Updatimg NextNumber Series
        $NextNumber = $nnm1->NextNumber + 1;
        $nnm1->update(['NextNumber' => $NextNumber]);
    }

    /**
     * Preparing PowerBI Response
     */

    public function preparePowerBIRiskResponse($bUnitID)
    {

        $KCI_OBJECT_TYPE = 20;
        $KRI_OBJECT_TYPE = 17;

        $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale')
            ->where('BunitID', $bUnitID)
            ->where('ObjType', 11)
            ->get();

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

            $kRIoRkciSummary = (new KeyRiskIndicatorService())->getRedOrNonComplinaceKCIORKRI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id);

            $totalKCI = OKRI::where('ObjType', $KCI_OBJECT_TYPE)
                ->where('o_i_t_m_id', $riskValue->o_i_t_m_id)
                ->count();

            $risk = [
                "count" => $count,
                "RiskID" => $riskValue->id,
                "RiskName" => $riskValue->item->Name,
                "InherentValue" => $InherentValue,
                "ResidualValue" => $ResidualValue,
                "TotalQuestions" => $this->getTotalKRIOrKCI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id),
                "NonCompliance" => 9,
                "TotalKRIs" => $this->getTotalKRIOrKCI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id),
                "RedKRIs" => $kRIoRkciSummary['totalRed'],
                "NotStartedOverdue" => 1,
                "WIPOverdue" => 9,
            ];
            array_push($allRisks, $risk);
            $count += $count;
        }

        return $allRisks;

    }

    /**
     *  GET TOTAL KRI OR KC1 RELATED TO RISK
     *
     *  @param int @ObjType   KCI = 20 , KRI = 17;
     *  @param int @riskID    Risk Event ID
     */
    public function getTotalKRIOrKCI($ObjType, $riskID)
    {
        $totalValue = OKRI::where('ObjType', $ObjType)
            ->where('o_i_t_m_id', $riskID)
            ->count();

        return $totalValue;
    }

    /**
     * GET LEVEL 1 RISK
     */

    public function getLevelOneRiskReportData($riskID)
    {

        $KCI_OBJECT_TYPE = 20;
        $KRI_OBJECT_TYPE = 17;

        $allRiskLevel = RISK5::where('parent', $riskID)->pluck('o_r_i_s_k_id');

        $bRisks = ORISK::with('item', 'ilikelihoodscale', 'rlikelihoodscale', 'rconsequencescale', 'levelonerisk')
            ->whereIn('id', $allRiskLevel)
            ->where('ObjType', 11)
            ->get();

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

            $risk = [
                "count" => $count,
                "RiskName" => $riskValue->item->Name,
                "InherentValue" => $InherentValue,
                "ResidualValue" => $ResidualValue,
                "TotalQuestions" => $this->getTotalKRIOrKCI($KCI_OBJECT_TYPE, $riskValue->o_i_t_m_id) ?? 0,
                "NonCompliance" => 9,
                "TotalKRIs" => $this->getTotalKRIOrKCI($KRI_OBJECT_TYPE, $riskValue->o_i_t_m_id) ?? 0,
                "RedKRIs" => 9,
                "NotStartedOverdue" => 1,
                "WIPOverdue" => 9,
            ];
            array_push($allRisks, $risk);
            $count += $count;
        }

        return $allRisks;
    }

    /**
     * MAP TREATMENT PLAN CATEGORY
     *
     */

    public function mapTreatmentPlanRanking($rank)
    {

        if ($rank == 0) {
            return "LOW";
        }

        if ($rank == 1) {
            return "MEDIUM";
        }

        return "HIGH";

    }

    /**
     *
     * Determing KRI Value
     */

    public function determineKRIValue($KRIId, $user_id)
    {

        $user = User::where('id', $user_id)->first();
        $val = OKRI::where('id', $KRIId)->first();

        $activeKRI1 = KRI1::where('o_k_r_i_id', $KRIId)
            ->where('user_id', $user?->id)
            ->first();

        $colorCodes = new stdClass();
        $color = "ACTIVE";
        $value = null;

        if ($activeKRI1) {
            if ($activeKRI1->Value <= $val->GreenAmber) {
                $color = "bg-success";
                $value = $activeKRI1->Value;
            }

            if ($activeKRI1->Value > $val->GreenAmber && $activeKRI1->Value <= $val->AmberRed) {
                $color = "bg-warning";
                $value = $activeKRI1->Value;
            }

            if ($activeKRI1->Value > $val->AmberRed) {
                $color = "bg-danger";
                $value = $activeKRI1->Value;
            }

            if ($activeKRI1->Value == null) {
                $color = "bg-success";
                $value = "ACTIVE";
            }

            $colorCodes->color = $color;
            $colorCodes->value = $value;
        }

        $colorCodes->color = $color;
        $colorCodes->value = $value;
        return $colorCodes;

    }

    /**
     *
     * CREATING NUMBERING SERIES FOR AN OBJECT
     *
     */
    public function createNumberingSeriesForAnObjType(int $ObjType, string $BeginStr): void
    {

        ONNM::updateOrCreate([
            'ObjType' => $ObjType,
        ], [
            'InitialNum' => 1,
            'NextNumber' => 1,
            'BeginStr' => $BeginStr,
        ]);

    }

}
