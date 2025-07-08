<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $table = "departments";
    protected $primaryKey = 'department_id';
    public $timestamps = true;

    public $fillable = ['department_id', 'department_name'];



    // public function people()
    // {
    //     return $this->belongsTo('people', 'department_id');
    // }


}
