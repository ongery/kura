<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WIP extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'w_i_p_s';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
