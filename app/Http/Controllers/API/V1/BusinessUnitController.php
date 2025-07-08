<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BUNIT1;
use App\Models\BUNIT;
use App\Models\User;
use App\Services\Shared\ApiResponseService;
use App\Services\Shared\DocumentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $BunitID = Auth::user()->BunitID;
            $data = BUNIT::with('manager', 'members', 'objectives')
                ->latest()
                //->where('id', $BunitID)
                ->paginate(100);
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
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
                "ObjType" => $request['ObjType']
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
        } catch (\Throwable $th) {
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

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'Acronym' => "required|string",
            'ObjType' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            $newData = BUNIT::where('id',$id)->update([
                "Name" => $request['Name'],
                "Acronym" => $request['Acronym'],
                "Manager" => $request['Manager'],
                "parent_id" => $request['parent_id'],
            ]);

            //Causes
            foreach ($request['selectedAssignments'] as $key => $value) {
                $user = User::where('id', $value)->first();
                $user->update([
                    "BunitID" => $id,
                ]);
            }
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bunit = BUNIT::findOrFail($id);
            $bunit->delete();
            return (new ApiResponseService())->apiSuccessResponseService("Deleted Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }

    public function addObjective(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string|min:4,max:191',
        ]);

        DB::beginTransaction();
        try {

            $newData = BUNIT1::updateOrcreate([
                "BunitID" => $request['id'],
                "description" => $request['description'],
            ]);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function deleteObjective($id)
    {

        try {
            $newData = BUNIT1::where('id', $id)->delete();
            return (new ApiResponseService())->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable $th) {

            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
