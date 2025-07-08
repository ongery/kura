<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessmentAnswers extends Model
{
    use HasFactory;

    protected $table = 'self_assessments_answers';

    protected $fillable = [
        'self_assessments_questions_id',
        'answer_id',
        'answer_text',
    ];

    /**
     * Get the question that owns the answer.
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * Get the SelfAssessment.
     */
    public function self_assessments_questions()
    {
        return $this->belongsTo(SelfAssessmentQuestions::class);
    }
}
