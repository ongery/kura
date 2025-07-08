<?php
namespace App\Models;

use App\Models\BUNIT;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ScoreCard extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $guarded = ['id'];
    public $table = "score_cards";
    protected $appends = array('freq');

    public function getFreqAttribute()
    {

        if ($this->Frequency == "D") {
            return "Daily";
        }

        if ($this->Frequency == "W") {
            return "Weekly";
        }

        if ($this->Frequency == "M") {
            return "Monthly";
        }

        if ($this->Frequency == "Q") {
            return "Quarterly";
        }

        if ($this->Frequency == "S") {
            return "Semi-Annually";
        }

        if ($this->Frequency == "A") {
            return "Annually";
        }

        if ($this->Frequency == "O") {
            return "On Demand";
        }

    }

    public function bunit()
    {
        return $this->belongsTo(BUNIT::class, 'BunitID');
    }

    public function strategicpillar()
    {
        return $this->belongsTo(ProfileData::class, 'pillar')->where('ObjType', 103);
    }

    public function strategicobjective()
    {
        return $this->belongsTo(ProfileData::class, 'objective')->where('ObjType', 104);
    }

    public function baseline_records()
    {
        return $this->hasMany(ScoreCardYear::class, 'scorecard_id');
    }

}
