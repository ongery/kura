<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SelfAssessment extends Model
{
    use HasFactory;

    protected $table = 'self_assessments';

    protected $fillable = [
        'user_id',
        'template_id',
    ];

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the template.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function self_assessments_questions()
    {
        return $this->hasMany(SelfAssessmentQuestions::class, 'self_assessment_id', 'id');
    }
}
