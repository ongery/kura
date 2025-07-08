<?php

namespace App\Models;

use App\Models\BUNIT;
use App\Models\ConsequenceScale;
use App\Models\LikelihoodScale;
use App\Models\OITM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ORISK extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'o_r_i_s_k_s';

    public function item()
    {
        return $this->belongsTo(OITM::class, 'o_i_t_m_id');
    }

    public function bunit()
    {
        return $this->belongsTo(BUNIT::class, 'BunitID');
    }
    public function causesimpact()
    {
        return $this->belongsToMany(OITM::class, 'r_i_s_k1_s');
    }

    public function levelonerisk()
    {
        return $this->belongsToMany(ORISK::class, 'r_i_s_k5_s', 'parent', 'o_r_i_s_k_id');
    }

    public function itemevents()
    {
        return $this->hasMany(RISK1::class, 'o_r_i_s_k_id');
    }

    public function scalesgroup()
    {
        return $this->hasMany(RISK2::class, 'o_r_i_s_k_id');
    }

    public function scalesgroupresidual()
    {
        return $this->hasMany(RISK2::class, 'o_r_i_s_k_id');
    }

    public function ilikelihoodscale()
    {
        return $this->belongsTo(LikelihoodScale::class, 'InherentLikelihoodScale');
    }
    public function rlikelihoodscale()
    {
        return $this->belongsTo(LikelihoodScale::class, 'ResidualLikelihoodScale');
    }

    public function rconsequencescale()
    {
        return $this->belongsTo(ConsequenceScale::class, 'ResidualConsequenceScale');
    }

    public function corporateRisk()
    {
        return $this->hasOne(CorporateRisks::class, 'id', 'o_i_t_m_id');
    }

}
