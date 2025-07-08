<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRI1 extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'k_r_i1_s';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
