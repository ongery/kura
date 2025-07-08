<?php

namespace App\Models\Qms;

use App\Models\BUNIT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procedure extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'procedures';


    public function bunit()
    {
        return $this->belongsTo(BUNIT::class, 'BunitID');
    }
}
