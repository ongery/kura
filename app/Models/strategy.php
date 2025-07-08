<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strategy extends Model
{
    use HasFactory;
    public $fillable = ['objective', 'KPI', 'target', 'initiatives','output','responsible'];
}
