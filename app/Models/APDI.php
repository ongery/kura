<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APDI extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'a_p_d_i_s';
}
