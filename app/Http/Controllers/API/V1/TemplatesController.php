<?php

namespace App\Http\Controllers\API\V1;

use App\Services\Shared\ApiResponseService;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\Question;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userId = Auth::id();
            $templates = Template::with('user')->where('user_id', $userId)->get();
            $questions = Question::select('id', 'question')->where('user_id', $userId)->get()->map(function ($q) {
                $q->value = $q->id;
                $q->text = $q->question;
                return $q;
            });
            return (new ApiResponseService())
                ->apiSuccessResponseService(['templates' => $templates, 'questions' => $questions]);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'questions' => 'nullable|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $userId = Auth::id();
            $data = $request->all();
            $data['user_id'] = $userId;
            $data['questions'] = implode(',', $request->questions);
            $data = Template::create($data);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'questions' => 'nullable|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $userId = Auth::id();
            $data = $request->all();
            $data['questions'] = implode(',', $request->questions);
            $data = Template::where(['user_id' => $userId, 'id' => $id])->update($data);
            return (new ApiResponseService())
                ->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $userId = Auth::id();
            Template::where(['user_id' => $userId, 'id' => $id])->delete();
            return (new ApiResponseService())
                ->apiSuccessResponseService("Deleted Successfully");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
