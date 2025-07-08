<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnairesResult extends Model
{
    use HasFactory;

    protected $table = 'self_assessment_questionnaire_result';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['questionnaire_id', 'date_send', 'questionnaire_status', 'review_status', 'last_comment', 'company', 'contact'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'created_at' ];


    public function questionnaires()
    {
        return $this->hasOne(Questionnaires::class, 'id', 'questionnaire_id');
    }

}
