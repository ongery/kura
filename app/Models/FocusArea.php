<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FocusArea extends Model
{
    use HasFactory;
    public $fillable = ['goal', 'department','description'];
}
