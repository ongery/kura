<?php
namespace App\Services\Transactions;

use App\Models\OITM;
use App\Services\Transactions\RisksServices;

class CorruptionManagementModuleService
{

    public function prepareCRAreport()
    {

        $functionaAreaObjectType = 29;
        $fraudRiskAreasObjectType = 30;
        $functionalAreas = OITM::where('ObjType', $functionaAreaObjectType)->get();

        $allData = [];
        foreach ($functionalAreas as $key => $value) {

            $value->MainRiskName = $value->Name;
            $fraudRiskAreas = OITM::with('category')->where('ObjType', $fraudRiskAreasObjectType)
                ->where('parent_id', $value->id)
                ->pluck('id');

            $riskEvents = OITM::where('ObjType', 32)
                ->whereIn('parent_id', $fraudRiskAreas)
                ->pluck('id')
                ->toArray();

            $dataRisks = [];
            $allRisks = (new RisksServices())->getRisks(33, $riskEvents);
            foreach ($allRisks as $key => $val) {
                array_push($dataRisks, $val);
            }

            $value->dataRisks = $dataRisks;
            $value->riskLevelOneData = $dataRisks;

            array_push($allData, $value);

        }

        $newArray = $this->formatCRAReportData($allData);

        return $newArray;

    }

    public function formatCRAReportData(array $array): array
    {

        $currentArray = $array;
        $newArr = [];
        $arr = [];
        foreach ($currentArray as $key => $value) {

            $count = [
                count($value['riskLevelOneData']),
            ];

            $arrMax = max($count);

            if ($arrMax > 0) {
                for ($i = 0; $i < $arrMax; $i++) {

                    $arrIndex = $i;
                    $arr['Count'] = '';
                    $arr['MainRiskName'] = '';
                    if ($arrIndex == '0') {
                        $arr['Count'] = $key + 1;
                        $arr['MainRiskName'] = isset($value['MainRiskName']) ? $value['MainRiskName'] : '';
                        $arr['RiskName'] = '';
                        $arr['TreatmentsPlans'] = '';
                        $arr['Activity'] = '';
                        $arr['Budget'] = '';
                        $arr['TimeFrame'] = '';
                    }

                    $data = $value['riskLevelOneData'][$arrIndex];
                    $arr['RiskName'] = isset($data['RiskName']) ? $data['RiskName'] : '';

                    //Handling Level 1 Data
                    $countLevel1 = [
                        count($data['Treatments']),
                    ];
                    $arrMax1 = max($countLevel1);

                    if ($arrMax1 > 0) {

                        for ($j = 0; $j < $arrMax1; $j++) {

                            $arrIndex1 = $j;

                            $Treatments = $data['Treatments'];

                            $arr['Count'] = '';
                            $arr['MainRiskName'] = '';
                            $arr['RiskName'] = '';

                            if ($arrIndex1 == '0') {
                                $arr['Count'] = $arrIndex == '0' ? $key + 1 : '';
                                $arr['MainRiskName'] = $arrIndex == '0' ? $value['MainRiskName'] : '';
                                $arr['RiskName'] = isset($data['RiskName']) ? $data['RiskName'] : '';
                                $arr['TreatmentsPlans'] = '';
                                $arr['Activity'] = '';
                                $arr['Budget'] = '';
                                $arr['TimeFrame'] = '';

                            }
                            $arr['TreatmentsPlans'] = isset($Treatments[$arrIndex1]['RiskSourceName']) ? $Treatments[$arrIndex1]['RiskSourceName'] : '';

                            //Handling Level 2 Data
                            $countLevel2 = [
                                count($data['Treatments'][$arrIndex1]['activities']),
                            ];
                            $arrMax2 = max($countLevel2);

                            if ($arrMax2 > 0) {

                                for ($k = 0; $k < $arrMax2; $k++) {

                                    $arrIndex2 = $k;
                                    $activities = $Treatments[$arrIndex1]['activities'];

                                    $arr['Count'] = '';
                                    $arr['MainRiskName'] = '';
                                    $arr['RiskName'] = '';
                                    $arr['TreatmentsPlans'] = '';

                                    if ($arrIndex1 == '0') {
                                        $arr['Count'] = $arrIndex == '0' ? $key + 1 : '';
                                        $arr['MainRiskName'] = $arrIndex == '0' ? $value['MainRiskName'] : '';
                                        $arr['RiskName'] = isset($data['RiskName']) ? $data['RiskName'] : '';
                                        $arr['TreatmentsPlans'] = isset($Treatments[$arrIndex1]['RiskSourceName']) ? $Treatments[$arrIndex1]['RiskSourceName'] : '';
                                        $arr['Activity'] = '';
                                        $arr['Budget'] = '';
                                        $arr['TimeFrame'] = '';

                                    }
                                    $arr['Activity'] = isset($activities[$arrIndex2]['Name']) ? $activities[$arrIndex2]['Name'] : '';
                                    $arr['Budget'] = isset($activities[$arrIndex2]['Rating']) ? $activities[$arrIndex2]['Rating'] : '';
                                    $arr['TimeFrame'] = isset($activities[$arrIndex2]['DueDate']) ? $activities[$arrIndex2]['DueDate'] : '';

                                    $newArr[] = $arr;

                                }

                            } else {
                                $newArr[] = $arr;
                            }

                        }

                    } else {
                        $newArr[] = $arr;
                    }

                }
            } else {
                $arr['Count'] = $key + 1;
                $arr['MainRiskName'] = isset($value['MainRiskName']) ? $value['MainRiskName'] : '';
                $arr['RiskName'] = '';
                $arr['TreatmentsPlans'] = '';
                $arr['Activity'] = '';
                $arr['Budget'] = '';
                $arr['TimeFrame'] = '';

                $newArr[] = $arr;
            }
        }

        return $newArr;

    }
}
