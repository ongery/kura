<?php
namespace App\Services\Transactions;

use App\Models\OKRI;

class KeyRiskIndicatorService
{
    public function mapFrequency(string $Frequency): string
    {

        if ($Frequency == "Daily") {
            return 'D';
        }

        if ($Frequency == "Weekly") {
            return "W";
        }

        if ($Frequency == "Monthly") {
            return "M";
        }

        if ($Frequency == "Quarterly") {
            return 'Q';
        }

        if ($Frequency == "Semi-Annually") {
            return "S";
        }

        if ($Frequency == "Annually") {
            return "A";
        }

        return "M";
    }

    /**
     * MAP INDICATORS RANKING
     */
    public function getKRIColorBasedOnValue(int $kriId, int $totalValue): string
    {

        $data = OKRI::with('kri1', 'item')->where('id', $kriId)
            ->first();

        $LowerLimit = $data->LowerLimit;
        $GreenAmber = $data->GreenAmber;
        $AmberRed = $data->AmberRed;
        $UpperLimit = $data->UpperLimit;

        $bgColor = null;
        if ($LowerLimit > $UpperLimit) {

            if ($totalValue >= $GreenAmber) {
                $bgColor = 'green';
            }

            if ($totalValue > $AmberRed) {
                $bgColor = 'amber';
            }

            if ($totalValue < $AmberRed) {
                $bgColor = 'red';
            }

            return $bgColor;
        }

        if ($LowerLimit < $UpperLimit) {

            if ($totalValue < $GreenAmber) {
                $bgColor = 'green';
            }

            if ($totalValue >= $GreenAmber) {
                $bgColor = 'amber';
            }
            if ($totalValue > $AmberRed) {
                $bgColor = 'red';
            }

            return $bgColor;
        }

    }

    /**
     * Calcuate Red,Non-Compliance,  KCI OR KRI
     *
     *
     */

    public function getRedOrNonComplinaceKCIORKRI(int $ObjType, int $riskID)
    {

        $KCI_OBJECT_TYPE = (int) 20;
        $KRI_OBJECT_TYPE = (int) 17;

        $allData = OKRI::with('kri1')->where('ObjType', $ObjType)
            ->where('o_i_t_m_id', $riskID)
            ->get();

        $totalRed = 0;
        $totalAmber = 0;
        $totalGreen = 0;
        $totalUnmetered = 0;
        $totalRedKCIs = 0;
        $totalGreenKCIs = 0;
        $totalunMeteredKCIs = 0;
        foreach ($allData as $key => $data) {

            $allKRI = $data->kri1;

            foreach ($allKRI as $key => $val) {

                if ($ObjType === $KRI_OBJECT_TYPE) {
                    if (!$val->Value) {
                        $totalUnmetered = $totalUnmetered + 1;
                        continue;
                    }
                    $color = $this->getKRIColorBasedOnValue($data->id, $val->Value);

                    if ($color == "red") {
                        $totalRed = $totalRed + 1;
                        continue;
                    }

                    if ($color == "amber") {
                        $totalAmber = $totalAmber + 1;
                        continue;
                    }

                    if ($color == "green") {
                        $totalGreen = $totalGreen + 1;
                        continue;
                    }
                }

                if ($ObjType === $KCI_OBJECT_TYPE) {

                    if (!$val->Value) {

                        $totalunMeteredKCIs = $totalunMeteredKCIs + 1;

                        continue;
                    }
                    if ($val->Value = 0) {
                        $totalRedKCIs = $totalRedKCIs + 1;
                        continue;
                    }

                    if ($val->Value = 1) {
                        $totalGreenKCIs = $totalGreenKCIs + 1;
                        continue;
                    }
                }
            }

        }

        $data = [
            'totalRed' => $totalRed,
            'totalAmber' => $totalAmber,
            'totalGreen' => $totalGreen,
            'totalUnmetered' => $totalUnmetered,
            'totalRedKCIs' => $totalRedKCIs,
            'totalGreenKCIs' => $totalGreenKCIs,
            'totalunMeteredKCIs' => $totalunMeteredKCIs,
        ];

        return $data;
    }

}
