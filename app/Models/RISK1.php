<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RISK1 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'r_i_s_k1_s';

    public function item()
    {
        return $this->belongsTo(OITM::class, 'o_i_t_m_id');
    }
}
