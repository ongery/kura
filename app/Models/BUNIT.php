<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BUNIT extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'b_u_n_i_t_s';

    public function childs()
    {

        return $this->hasMany(BUNIT::class, 'parent_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'Manager');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'Manager');
    }
    public function objectives()
    {
        return $this->hasMany(BUNIT1::class, 'BunitID');
    }

    public function members()
    {
        return $this->hasMany(User::class, 'BunitID');

    }
}
