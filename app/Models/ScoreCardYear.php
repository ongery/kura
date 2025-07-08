<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreCardYear extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'score_card_years';
}
