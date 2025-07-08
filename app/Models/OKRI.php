<?php

namespace App\Models;

use App\Models\APDI;
use App\Models\KRI1;
use App\Models\OITM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OKRI extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'o_k_r_i_s';

    protected $appends = array('freq');
    public function users()
    {
        return $this->belongsToMany(User::class, 'k_r_i1_s');
    }

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

    public function kri1()
    {
        return $this->hasMany(KRI1::class, 'o_k_r_i_id');
    }

    public function item()
    {
        return $this->belongsTo(OITM::class, 'o_i_t_m_id');
    }

    public function objecttype()
    {
        return $this->belongsTo(APDI::class, 'ObjType', 'ObjType');
    }

}
