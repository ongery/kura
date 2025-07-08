<?php
namespace App\Services\Transactions;

use App\Models\ProfileData;
use App\Models\ScoreCard;
use App\Models\WorkPlan;

class StratetegicModuleService
{

    public function prepareStrategicreport()
    {

        $OBJECTIVE_OBTYPE = 104;

        $data = ProfileData::where('ObjType', $OBJECTIVE_OBTYPE)->get();

        foreach ($data as $key => $val) {
            $scoreCards = ScoreCard::with('bunit', 'baseline_records')->where('objective', $val->id)->get();
            foreach ($scoreCards as $key => $scorecard) {
                $workPlans = WorkPlan::with('user')->where('scorecard_id', $scorecard->id)->get();

                $scorecard->workplan = $workPlans;

            }

            $val->scorecards = $scoreCards;

        }

        $newArray = $this->formatCRAReportData($data->ToArray());

        return $newArray;

    }

    public function formatCRAReportData(array $array): array
    {

        $currentArray = $array;
        $newArr = [];
        $arr = [];
        foreach ($currentArray as $key => $value) {

            $count = [
                count($value['scorecards']),
            ];

            $arrMax = max($count);

            if ($arrMax > 0) {
                for ($i = 0; $i < $arrMax; $i++) {

                    $arrIndex = $i;
                    $arr['Count'] = '';
                    $arr['MainRiskName'] = '';
                    if ($arrIndex == '0') {
                        $arr['Count'] = $key + 1;
                        $arr['MainRiskName'] = isset($value['description']) ? $value['description'] : '';
                        $arr['KPI'] = '';
                        $arr['Target'] = '';
                        $arr['Initiative'] = '';
                        $arr['Output'] = '';
                        $arr['Responsible'] = '';
                        $arr['ActualOutput'] = '';
                    }

                    $data = $value['scorecards'][$arrIndex];
                    $arr['KPI'] = isset($data['measure']) ? $data['measure'] : '';
                    $arr['Target'] = isset($data['Target']) ? $data['Target'] : '';

                    $count1 = [
                        count($data['workplan']),
                    ];
                    $arrMax1 = max($count1);

                    if ($arrMax1 > 0) {

                        for ($j = 0; $j < $arrMax1; $j++) {

                            $arrIndex1 = $j;
                            $workPlan = $data['workplan'];

                            $arr['Count'] = '';
                            $arr['MainRiskName'] = '';
                            $arr['KPI'] = '';
                            $arr['Target'] = '';
                            if ($arrIndex1 == '0') {
                                $arr['Count'] = $key + 1;
                                $arr['MainRiskName'] = $arrIndex == '0' ? $value['description'] : '';
                                $arr['KPI'] = isset($data['measure']) ? $data['measure'] : '';
                                $arr['Target'] = isset($data['Target']) ? $data['Target'] : '';
                                $arr['Initiative'] = '';
                                $arr['Output'] = '';
                                $arr['Responsible'] = '';
                                $arr['ActualOutput'] = '';
                            }

                            $arr['Initiative'] = isset($workPlan[$arrIndex1]['Activity']) ? $workPlan[$arrIndex1]['Activity'] : '';
                            $arr['Output'] = isset($workPlan[$arrIndex1]['Output']) ? $workPlan[$arrIndex1]['Output'] : '';
                            $arr['Responsible'] = isset($workPlan[$arrIndex1]['UserSign']) ? $workPlan[$arrIndex1]['user']['Fname'] . " " . $workPlan[$arrIndex1]['user']['Lname'] : '';
                            $arr['ActualOutput'] = isset($workPlan[$arrIndex1]['ActualOutput']) ? $workPlan[$arrIndex1]['ActualOutput'] : '';

                            $newArr[] = $arr;
                        }

                    } else {
                        $newArr[] = $arr;
                    }

                }
            } else {
                $arr['Count'] = $key + 1;
                $arr['MainRiskName'] = isset($value['description']) ? $value['description'] : '';
                $arr['KPI'] = '';
                $arr['Target'] = '';
                $arr['Initiative'] = '';
                $arr['Output'] = '';
                $arr['Responsible'] = '';
                $arr['ActualOutput'] = '';

                $newArr[] = $arr;
            }
        }

        return $newArr;

    }
}
