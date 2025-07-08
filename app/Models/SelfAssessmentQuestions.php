<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessmentQuestions extends Model
{
    use HasFactory;

    protected $table = 'self_assessments_questions';

    protected $fillable = [
        'self_assessment_id',
        'question_id',
    ];

    /**
     * Get the question that owns the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the SelfAssessment.
     */
    public function self_assessment()
    {
        return $this->belongsTo(SelfAssessment::class);
    }

    public function self_assessments_answers()
    {
        return $this->hasMany(SelfAssessmentAnswers::class, 'self_assessments_questions_id', 'id');
    }
}
