<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BUNIT1;
use App\Models\BUNIT;
use App\Models\NotificationRow;
use App\Models\OKRI;
use App\Models\User;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\DocumentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {

            $user = Auth::user();

            $data = NotificationRow::with('objecttype')->latest()
                ->where('user_id', $user->id)
                ->paginate(10);
            foreach ($data as $key => $val) {

                $val->source = OKRI::where('id', $val->DocNum)->first();
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Acronym' => "required|string",
            'ObjType' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {

            $DocNum = (new DocumentsService())->documentNumembering($request['ObjType']);
            $newData = BUNIT::create([
                "Name" => $request['Name'],
                "Acronym" => $request['Acronym'],
                "Manager" => $request['Manager'],
                "parent_id" => $request['parent_id'],
            ]);

            //Causes
            foreach ($request['selectedAssignments'] as $key => $value) {
                $user = User::where('id', $value)->first();
                $user->update([
                    "BunitID" => $newData->id,
                ]);
            }

            if ($request['description']) {
                $newData = BUNIT1::create([
                    "BunitID" => $newData->id,
                    "description" => $request['description'],
                ]);
            }

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
            $data = BUNIT::with('manager', 'members', 'objectives')
                ->where('id', $id)
                ->first();
            $data->description = null;
            if ($data->objectives) {
                $data->description = $data->objectives->description;
            }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
