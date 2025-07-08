<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateRisks extends Model
{
    use HasFactory;

    protected $table = 'corporate_risks';
    protected $fillable = [
        'DocNum',
        'ObjType',
        'Name',
        'Description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
