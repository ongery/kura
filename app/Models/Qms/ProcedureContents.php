<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedureContents extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'procedure_contents';
}
