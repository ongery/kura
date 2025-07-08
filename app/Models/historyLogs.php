<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyLogs extends Model
{
    use HasFactory;

    protected $table = 'history_logs';
    protected $fillable = [
        'user_id',
        'action',
        'logs'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function users () {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
}
