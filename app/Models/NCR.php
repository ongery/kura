<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NCR extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'n_c_r_s';
}
