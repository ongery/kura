<?php

namespace App\Services\Shared;

/**
 * Service for Marke
 */
class ArrayFormatingService
{

    public function formatERMDataExport(array $array): array
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
                        $arr['InherentValue'] = $arrIndex == '0' ? $value['InherentValue'] : '';
                        $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                        $arr['RiskName'] = '';
                        $arr['InherentValue1'] = '';
                        $arr['ResidualValue1'] = '';
                        $arr['RiskSource'] = '';
                        $arr['RiskImpact'] = '';
                        $arr['ControlItems'] = '';
                        $arr['KCIitems'] = '';
                        $arr['KRIitems'] = '';
                        $arr['TreatmentsPlans'] = '';
                        $arr['actionStatus'] = '';

                    }

                    $data = $value['riskLevelOneData'][$arrIndex];
                    $arr['RiskName'] = isset($data['RiskName']) ? $data['RiskName'] : '';
                    $arr['InherentValue1'] = isset($data['InherentValue']) ? $data['InherentValue'] : '';
                    $arr['ResidualValue1'] = isset($data['ResidualValue']) ? $data['ResidualValue'] : '';

                    //Handling Level 1 Data

                    $countLevel1 = [
                        count($data['RiskSource']),
                        count($data['RiskImpacts']),
                        count($data['ControlItems']),
                        count($data['KCIItems']),
                        count($data['KRIItems']),
                        count($data['Treatments']),
                    ];

                    $arrMax1 = max($countLevel1);

                    if ($arrMax1 > 0) {

                        for ($j = 0; $j < $arrMax1; $j++) {

                            $arrIndex1 = $j;

                            $riskSources = $data['RiskSource'];
                            $riskImpacts = $data['RiskImpacts'];
                            $controlItems = $data['ControlItems'];
                            $KCIitems = $data['KCIitems'];
                            $KRIItems = $data['KRIItems'];
                            $Treatments = $data['Treatments'];

                            $arr['Count'] = '';
                            $arr['MainRiskName'] = '';
                            $arr['InherentValue'] = '';
                            $arr['ResidualValue'] = '';
                            $arr['RiskName'] = '';
                            $arr['InherentValue1'] = '';
                            $arr['ResidualValue1'] = '';

                            if ($arrIndex1 == '0') {
                                $arr['Count'] = $key + 1;
                                $arr['MainRiskName'] = $arrIndex == '0' ? $value['MainRiskName'] : '';
                                $arr['InherentValue'] = $arrIndex == '0' ? $value['InherentValue'] : '';
                                $arr['ResidualValue'] = $arrIndex == '0' ? $value['ResidualValue'] : '';
                                $arr['RiskName'] = isset($data['RiskName']) ? $data['RiskName'] : '';
                                $arr['InherentValue1'] = isset($data['InherentValue']) ? $data['InherentValue'] : '';
                                $arr['ResidualValue1'] = isset($data['ResidualValue']) ? $data['ResidualValue'] : '';
                                $arr['RiskSource'] = '';
                                $arr['RiskImpact'] = '';
                                $arr['ControlItems'] = '';
                                $arr['KCIitems'] = '';
                                $arr['KRIitems'] = '';
                                $arr['TreatmentsPlans'] = '';
                                $arr['actionStatus'] = '';
                            }

                            $arr['RiskSource'] = isset($riskSources[$arrIndex1]['RiskSourceName']) ? $riskSources[$arrIndex1]['RiskSourceName'] : '';
                            $arr['RiskImpact'] = isset($riskImpacts[$arrIndex1]['RiskSourceName']) ? $riskImpacts[$arrIndex1]['RiskSourceName'] : '';
                            $arr['ControlItems'] = isset($controlItems[$arrIndex1]['RiskSourceName']) ? $controlItems[$arrIndex1]['RiskSourceName'] : '';
                            $arr['KCIitems'] = isset($KCIitems[$arrIndex1]['RiskSourceName']) ? $KCIitems[$arrIndex1]['RiskSourceName'] : '';
                            $arr['KRIitems'] = isset($KRIItems[$arrIndex1]['RiskSourceName']) ? $KRIItems[$arrIndex1]['RiskSourceName'] : '';
                            $arr['TreatmentsPlans'] = isset($Treatments[$arrIndex1]['RiskSourceName']) ? $Treatments[$arrIndex1]['RiskSourceName'] : '';
                            $arr['actionStatus'] = isset($Treatments[$arrIndex1]['actionStatus']) ? $Treatments[$arrIndex1]['actionStatus'] : '';
                            $newArr[] = $arr;

                        }

                    } else {
                        $newArr[] = $arr;
                    }

                }
            } else {
                $arr['Count'] = $key + 1;
                $arr['MainRiskName'] = isset($value['MainRiskName']) ? $value['MainRiskName'] : '';
                $arr['InherentValue'] = '';
                $arr['ResidualValue'] = '';
                $arr['RiskName'] = '';
                $arr['InherentValue1'] = '';
                $arr['ResidualValue1'] = '';
                $arr['RiskSource'] = '';
                $arr['RiskImpact'] = '';
                $arr['ControlItems'] = '';
                $arr['KCIitems'] = '';
                $arr['KRIitems'] = '';
                $arr['TreatmentsPlans'] = '';
                $arr['actionStatus'] = '';

                $newArr[] = $arr;
            }
        }

        return $newArr;

    }

    public function formatQMSDataForExport(array $array)
    {

        $currentArray = $array;
        $newArr = [];
        $arr = [];
        foreach ($currentArray as $key => $value) {

            $count = [
                count($value['riskLevelOneData']),

            ];

            $arrMax = max($count);

            $data = $value['riskLevelOneData'];

            if ($arrMax > 0) {
                for ($i = 0; $i < $arrMax; $i++) {
                    $arrIndex = $i;
                    $arr['Count'] = '';
                    $arr['ProcedureNo'] = '';
                    $arr['ProcedureTitle'] = '';
                    if ($arrIndex == '0') {

                        $arr['Count'] = $key + 1;
                        $arr['ProcedureNo'] = isset($value['description']) ? $value['description'] : '';
                        $arr['ProcedureTitle'] = isset($value['ProcedureTitlte']) ? $value['ProcedureTitlte'] : '';
                        $arr['RiskEvent'] = '';
                        $arr['InherentValue'] = '';
                        $arr['ResidualValue'] = '';
                        $arr['Opportunities'] = '';

                    }
                    $arr['RiskEvent'] = isset($data[$arrIndex]['RiskName']) ? $data[$arrIndex]['RiskName'] : '';
                    $arr['InherentValue'] = isset($data[$arrIndex]['InherentValue']) ? $data[$arrIndex]['InherentValue'] : '';
                    $arr['ResidualValue'] = isset($data[$arrIndex]['ResidualValue']) ? $data[$arrIndex]['ResidualValue'] : '';
                    $newArr[] = $arr;
                }
            } else {
                $arr['Count'] = $key + 1;
                $arr['ProcedureNo'] = isset($value['description']) ? $value['description'] : '';
                $arr['ProcedureTitle'] = '';
                $arr['RiskEvent'] = '';
                $arr['InherentValue'] = '';
                $arr['ResidualValue'] = '';
                $arr['Opportunities'] = '';
                $newArr[] = $arr;
            }
        }

        return $newArr;
    }
}
