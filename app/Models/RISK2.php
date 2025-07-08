<?php

namespace App\Models;

use App\Models\OITM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RISK2 extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'r_i_s_k2_s';

    public function item()
    {
        return $this->belongsTo(OITM::class, 'o_i_t_m_id');
    }
}
