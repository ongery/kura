<?php

namespace App\Http\Controllers\API\V1;

use App\Services\Shared\ApiResponseService;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userId = Auth::id();
            $data = Question::with(['user', 'answers' => function ($query) {
                $query->select('id', 'question_id', 'answer')
                    ->get()
                    ->map(function ($answer) {
                        $answer->text = $answer->answer;
                        return $answer;
                    });
            }])->where('user_id', $userId)->get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
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
            'question' => 'required|string|max:1000',
            'option' => 'required|string|max:100|in:single,multiple,fill',
            'answers' => 'nullable|array',
            'answers.*.answer' => 'nullable|string|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $userId = Auth::id();
            $data = $request->only(['question', 'option']);
            $data['user_id'] = $userId;
            $question = Question::create($data);
            $answers = array_map(function ($answer) use ($question) {
                return [
                    'question_id' => $question->id,
                    'answer' => $answer['answer'],
                ];
            }, $request->answers);
            Answer::insert($answers);
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
            'question' => 'required|string|max:1000',
            'option' => 'required|string|max:100|in:single,multiple,fill',
            'answers' => 'nullable|array',
            'answers.*.answer' => 'nullable|string|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $userId = Auth::id();
            $data = $request->only(['question', 'option']);
            $data['user_id'] = $userId;

            $question = Question::where(['user_id' => $userId, 'id' => $id])->first();
            if ($question) {
                Question::where(['user_id' => $userId, 'id' => $id])->update($data);

                $existingAnswerIds = Answer::where('question_id', $id)->pluck('id')->toArray();

                $newAnswers = [];
                $updatedAnswers = [];
                $requestAnswerIds = [];

                foreach ($request->answers as $answer) {
                    if (isset($answer['id']) && in_array($answer['id'], $existingAnswerIds)) {
                        $requestAnswerIds[] = $answer['id'];
                        $updatedAnswers[] = [
                            'id' => $answer['id'],
                            'answer' => $answer['answer'],
                            'question_id' => $id
                        ];
                    } else {
                        $newAnswers[] = [
                            'question_id' => $id,
                            'answer' => $answer['answer']
                        ];
                    }
                }

                foreach ($updatedAnswers as $updatedAnswer) {
                    Answer::where(['id' => $updatedAnswer['id'], 'question_id' => $updatedAnswer['question_id']])->update(['answer' => $updatedAnswer['answer']]);
                }

                Answer::insert($newAnswers);

                $answersToDelete = array_diff($existingAnswerIds, $requestAnswerIds);
                if (!empty($answersToDelete)) {
                    Answer::whereIn('id', $answersToDelete)->delete();
                }
                return (new ApiResponseService())
                    ->apiSuccessResponseService("Updated Successfully");
            }
            return (new ApiResponseService())->apiFailedResponseService("Something Went Wrong!");
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
            $question = Question::where(['user_id' => $userId, 'id' => $id])->first();
            if ($question) {
                Answer::where(['question_id' => $id])->delete();
                Question::where(['user_id' => $userId, 'id' => $id])->delete();
                return (new ApiResponseService())
                    ->apiSuccessResponseService("Deleted Successfully");
            }
            return (new ApiResponseService())->apiFailedResponseService("Something Went Wrong!");
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
