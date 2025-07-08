<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\WIP;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkInPregressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action_tracking_id = \Request::get('action_tracking_id');
        try {
            $data = WIP::with('user')
                ->latest()
                ->where('action_tracking_id', $action_tracking_id)
                ->paginate(100);
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
            'action_tracking_id' => 'required|integer',
            'description' => 'required',
        ]);

        $fileName = null;
        if ($request->records != "null") {

            $this->validate($request, [
                'records' => 'mimes:pdf|max:2048',
            ]);
            $fileName = time() . '.' . $request->records->getClientOriginalExtension();
            $request->records->storeAs('files', $fileName);
        }

        try {
            $newData = WIP::create([
                "action_tracking_id" => $request['action_tracking_id'],
                'user_id' => Auth::user()->id,
                "Name" => $request['Name'],
                "description" => $request['description'],
                'file_path' => $fileName,
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable$th) {
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
        //
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
