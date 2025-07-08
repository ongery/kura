<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ProfileData;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;

class ProfileDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ObjType = \Request::get('ObjType');
        try {
            $data = ProfileData::where('ObjType', $ObjType)->get();
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

        $STRATEGIC_PILLAR_OBJTYPE = 103;

        $this->validate($request, [
            'ObjType' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request['ObjType'] === $STRATEGIC_PILLAR_OBJTYPE) {
            $this->validate($request, [
                'title' => 'required',
            ]);
        }

        try {
            $newData = ProfileData::create([
                "ObjType" => $request['ObjType'],
                "description" => $request['description'],
                "title" => $request['title'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Created Successfully");
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

        $STRATEGIC_PILLAR_OBJTYPE = 103;

        $this->validate($request, [
            'ObjType' => 'required|integer',
            'description' => 'required',
        ]);

        if ($request['ObjType'] = $STRATEGIC_PILLAR_OBJTYPE) {
            $this->validate($request, [
                'title' => 'required',
            ]);
        }
        try {

            $profileData = ProfileData::where('id', $id)->first();
            $profileData->update([
                "ObjType" => $request['ObjType'],
                "description" => $request['description'],
                "title" => $request['title'],
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable$th) {
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

            $profileData = ProfileData::where('id', $id)->first();
            $profileData->delete();
            return (new ApiResponseService())
                ->apiSuccessResponseService("Delete Successfully");
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
