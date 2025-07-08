<?php

namespace App\Models;

use App\Models\ITM1;
use App\Models\ORISK;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OITM extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'o_i_t_m_s';

    public function itm1()
    {
        return $this->hasMany(ITM1::class, 'o_i_t_m_id');
    }

    public function risk1()
    {
        return $this->hasMany(RISK1::class, 'o_i_t_m_id');
    }

    public function risk3()
    {
        return $this->hasMany(RISK3::class, 'o_i_t_m_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function qmsrisks()
    {
        return $this->belongsToMany(ORISK::class, 'r_i_s_k1_s');
    }

    public function opportunities()
    {
        return $this->hasMany(ActionTracking::class, 'o_i_t_m_id')->where('ObjType', 41);
    }

}
