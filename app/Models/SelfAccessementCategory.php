<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAccessementCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'self_accessement_categories';
}
