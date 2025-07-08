<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Target extends Authenticatable
{
    use Notifiable, HasFactory;
    public $table = "targets";
    protected $primaryKey = 'scorecard_id';
    public $timestamps = true;
    /*
     * Important records to be filled
     */
    protected $fillable = [
        'id','scorecard_id','b_2020','b_2021','b_2022','b_2023','b_2024','b_2025'
    ];

}