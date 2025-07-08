<?php

namespace App\Http\Controllers\API\V1;

use App\Events\KCIORKRIAddedEvent;
use App\Http\Controllers\Controller;
use App\Models\KRI1;
use App\Models\OKRI;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\DocumentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KeyRiskIndicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ISO_KPI_OBJECT_TYPE = 27;
        $KMI_OBJECT_TYPE = 28;

        $fetchAll = false;
        if (\Request::get('fetchAll')) {
            $fetchAll = true;
        }

        $ObjType = \Request::get('ObjType');
        try {
            $data = OKRI::with('kri1')->where('ObjType', $ObjType)
                ->whereHas('kri1', function ($q) {
                    $user = Auth::user();
                    $q->where('user_id', $user->id);
                })
                ->paginate(100);

            if ($fetchAll) {
                $data = OKRI::with('kri1')->where('ObjType', $ObjType)->paginate(100);
            }

            foreach ($data as $key => $val) {
                $user = Auth::user();
                $activeKRI1 = KRI1::where('o_k_r_i_id', $val->id)
                    ->where('user_id', $user->id)
                    ->first();
                $val->activeKRI1 = $activeKRI1;

                if ($activeKRI1) {
                    if ($ObjType == 17 || $ObjType == $ISO_KPI_OBJECT_TYPE) {
                        if ($activeKRI1->Value <= $val->GreenAmber) {
                            $val->color = "bg-success";
                        }

                        if ($activeKRI1->Value > $val->GreenAmber && $activeKRI1->Value <= $val->AmberRed) {
                            $val->color = "bg-warning";
                        }

                        if ($activeKRI1->Value > $val->AmberRed) {
                            $val->color = "bg-danger";
                        }

                        if ($activeKRI1->Value == null) {
                            $val->color = "bg-grey";
                            $val->activeKRI1->Value = "ACTIVE";
                        }
                    }

                    if ($ObjType == 20 || $ObjType == $KMI_OBJECT_TYPE) {
                        if ($activeKRI1->Value <= 2) {
                            $val->realValue = "Yes";
                            $val->color = "bg-success";
                        }

                        if ($activeKRI1->Value <= 1) {
                            $val->realValue = "No";
                            $val->color = "bg-danger";
                        }

                        if ($activeKRI1->Value == null) {
                            $val->color = "bg-grey";
                            $val->realValue = "ACTIVE";
                        }
                    }
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
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
            'CategoryID' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request['ObjType'] == 19) {
            $this->validate($request, [
                'DataType' => 'required',
                'LowerLimit' => 'required',
                'GreenAmber' => 'required',
                'AmberRed' => 'required',
                'UpperLimit' => 'required',
            ]);
        }
        if ($request['DataType'] == 2 && $request['ObjType'] == 19) {
            $this->validate($request, [
                'UpperLimit' => 'required|max:100',
                'LowerLimit' => 'required|max:100',
                'GreenAmber' => 'required|max:100',
                'AmberRed' => 'required|max:100',
            ]);
        }
        $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
        try {
            $newData = OKRI::create([
                'DocNum' => $DocNum,
                "ObjType" => $request['ObjType'],
                'o_i_t_m_id' => $request['o_i_t_m_id'],
                'CategoryID' => $request['CategoryID'],
                'Name' => $request['Name'],
                'description' => $request['description'],
                'Weight' => $request['Weight'],
                'Frequency' => $request['Frequency'],
                'StartDate' => $request['StartDate'],
                'DataType' => $request['DataType'],
                'LowerLimit' => $request['LowerLimit'],
                'GreenAmber' => $request['GreenAmber'],
                'AmberRed' => $request['AmberRed'],
                'UpperLimit' => $request['UpperLimit'],
            ]);

            //Causes
            foreach ($request['selectedAssignments'] as $key => $value) {
                $newData->users()->attach($value);
            }

            KCIORKRIAddedEvent::dispatch($newData);

            (new DocumentsService())->updateNumbering($request['ObjType']);
            return (new ApiResponseService())
                ->apiSuccessResponseService($newData);
        } catch (\Throwable $th) {
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

        $forEdit = false;
        if (\Request::get('forEdit')) {
            $forEdit = true;
        }
        try {
            $user = Auth::user();
            $data = OKRI::with('kri1', 'item')->where('id', $id)
                ->whereHas('kri1', function ($q) use ($forEdit) {
                    if (!$forEdit) {
                        $user = Auth::user();
                        $q->where('user_id', $user->id);
                    }
                })
                ->first();

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
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
            'CategoryID' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request['ObjType'] == 19) {
            $this->validate($request, [
                'DataType' => 'required',
                'LowerLimit' => 'required',
                'GreenAmber' => 'required',
                'AmberRed' => 'required',
                'UpperLimit' => 'required',
            ]);
        }
        if ($request['DataType'] == 2 && $request['ObjType'] == 19) {
            $this->validate($request, [
                'UpperLimit' => 'required|max:100',
                'LowerLimit' => 'required|max:100',
                'GreenAmber' => 'required|max:100',
                'AmberRed' => 'required|max:100',
            ]);
        }

        try {

            $newData = OKRI::where('id', $id)->update([
                'o_i_t_m_id' => $request['o_i_t_m_id'],
                'CategoryID' => $request['CategoryID'],
                'Name' => $request['Name'],
                'description' => $request['description'],
                'Weight' => $request['Weight'],
                'Frequency' => $request['Frequency'],
                'StartDate' => $request['StartDate'],
                'DataType' => $request['DataType'],
                'LowerLimit' => $request['LowerLimit'],
                'GreenAmber' => $request['GreenAmber'],
                'AmberRed' => $request['AmberRed'],
                'UpperLimit' => $request['UpperLimit'],
            ]);

            return (new ApiResponseService())
                ->apiSuccessResponseService($newData);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function recordKriCompliance(Request $request)
    {
        $user = Auth::user();
        $okri = OKRI::with('kri1')->where('id', $request['id'])->first();

        if ($okri->DataType == 2) {
            $this->validate($request, [
                'Value' => 'required|max:100',
            ]);
        }
        try {
            $kri1 = KRI1::where('o_k_r_i_id', $okri->id)
                ->where('user_id', $user->id)
                ->first();

            $kri1->update([
                'Value' => $request['Value'],
                'desc' => $request['desc'],
            ]);

            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
