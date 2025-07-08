<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedureRows extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'procedure_rows';
}
