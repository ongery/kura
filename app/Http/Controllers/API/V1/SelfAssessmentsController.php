<?php

namespace App\Http\Controllers\API\V1;

use App\Models\SelfAssessmentQuestions;
use App\Models\SelfAssessmentAnswers;
use App\Services\Shared\ApiResponseService;
use Illuminate\Support\Facades\Validator;
use App\Models\SelfAssessment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class SelfAssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userId = Auth::id();
            $templates = Template::with('user')->where('user_id', $userId)->get();
            $questions = Question::with('answers:id,question_id,answer')->select('id', 'question', 'option')->where('user_id', $userId)->get();
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
            'id' => 'required|integer|exists:assessment_templates,id',
            'answers' => ['required', 'array'],
            'answers.*' => [
                function ($attribute, $value, $fail) use ($request) {
                    $index = explode('.', $attribute)[1] ?? null;

                    if (!Question::where('id', $index)->exists()) {
                        $fail("The question is not valid.");
                    }
                    if (is_array($value)) {
                        foreach ($value as $item) {
                            if (!is_integer($item) && !is_string($item)) {
                                $fail("The answer value must be an integer or a string1.");
                            }
                            if (is_integer($item) && !Answer::where('id', $item)->exists()) {
                                $fail("The answer is not valid.");
                            }
                        }
                    } else {
                        if (is_integer($value)) {
                            if (!Answer::where('id', $value)->exists()) {
                                $fail("The answer is not valid.");
                            }
                        } elseif (!is_string($value)) {
                            $fail("The answer value must be an integer or a string2.");
                        }
                    }
                }
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $userId = Auth::id();
            $data = $request->all();
            $data['user_id'] = $userId;
            $data['template_id'] = $userId;
            $selfAssessment = SelfAssessment::create($data);
            $selfAnswersBatch = [];
            foreach ($request->answers as $key => $answer) {
                $selfQuestions = SelfAssessmentQuestions::create([
                    'self_assessment_id' => $selfAssessment->id,
                    'question_id' => $key,
                ]);

                if (is_array($answer)) {
                    foreach ($answer as $item) {
                        $selfAnswersBatch[] = [
                            'self_assessments_questions_id' => $selfQuestions->id,
                            'answer_id' => $item,
                            'answer_text' => null
                        ];
                    }
                } else {
                    $selfAnswersBatch[] = [
                        'self_assessments_questions_id' => $selfQuestions->id,
                        'answer_id' => is_integer($answer) ? $answer : null,
                        'answer_text' => is_string($answer) ? $answer : null,
                    ];
                }
            }
            SelfAssessmentAnswers::insert($selfAnswersBatch);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
