<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsequenceMatrixRank extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'consequence_matrix_rank';

    protected $fillable = [
        'o_i_t_m_id',
        'location',
        'scalesGroupId', 
        'groupType', 
        'segment', 
        'section', 
        'level', 
        'value'
    ];


    public function ConsequenceMatrix () {
        return $this->hasOne(ConsequenceMatrix::class);
    }
}
