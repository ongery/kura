<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ObjType = \Request::get('ObjType');
        $DocEntry = \Request::get('DocEntry');
        try {
            $data = Attachment::where('DocEntry', $DocEntry)
                ->latest()
                ->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
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
            'description' => 'required',
            'records' => 'mimes:pdf|max:2048',
            'ObjType' => 'required',
            'DocEntry' => 'required',
        ]);

        if ($request->records) {
            $fileName = time() . '.' . $request->records->getClientOriginalExtension();
            $request->records->storeAs('files', $fileName);
            Log::info($fileName);
        }

        try {
            $newData = Attachment::create([
                "ObjType" => $request['ObjType'],
                'DocEntry' => $request['DocEntry'],
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
