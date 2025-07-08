<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

            $data = Category::where(function ($q) use ($ObjType) {
                if ($ObjType) {
                    $q->where('ObjType', $ObjType);
                }
            })

                ->orderBy('ObjType', 'asc')
                ->where('ObjType', '!=', 18)
                ->paginate(100);

            if ($ObjType == 18) {
                $data = Category::where('ObjType', 18)
                    ->paginate(100);
            }

            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable $th) {
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
        ]);
        $category = Category::where('Name', $request['Name'])
            ->where('ObjType', $request['ObjType'])
            ->first();
        if ($category) {
            return (new ApiResponseService())->apiFailedResponseService("Category Already Exist");
        }

        DB::beginTransaction();
        try {
            $newData = Category::create([
                "Name" => $request['Name'],
                "ObjType" => $request['ObjType'],
            ]);
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
        $this->validate($request, [
            'Name' => 'required|string|min:4,max:191',
        ]);
        $category = Category::where('Name', $request['Name'])
            ->where('id', '!=', $id)
            ->where('ObjType', $request['ObjType'])
            ->first();
        if ($category) {
            return (new ApiResponseService())->apiFailedResponseService("Category Already Exist");
        }

        DB::beginTransaction();
        try {
            $newData = Category::where('id', $id)
                ->update([
                    "Name" => $request['Name'],
                    "ObjType" => $request['ObjType']
                ]);
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
            $category = Category::findOrFail($id);
            $category->delete();
            return (new ApiResponseService())
                ->apiSuccessResponseService("Deleted Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }

    }
}
