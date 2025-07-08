<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ONNM extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'o_n_n_m_s';
}
