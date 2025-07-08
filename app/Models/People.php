<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    public $table = "people";
    protected $primaryKey = 'id';
    public $timestamps = true;


    public $fillable = ['names','department_id','department','level'];


    // public function departments()
    // {
    //     return $this->hasMany('departments', 'department_id');
    // }
}
