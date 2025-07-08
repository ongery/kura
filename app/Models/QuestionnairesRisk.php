<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnairesRisk extends Model
{
    use HasFactory;

    protected $table = 'self_assessment_questionnaire_risk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['questionnaire_id', 'project_name', 'site_location', 'affected_assets', 'team', 'addi_stakeholders', 'owner', 'owners_manager', 'tags'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];


}
