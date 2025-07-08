<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'incidents';


    public function creator()
    {
        return $this->belongsTo(User::class, 'UserSign');
    }
}
