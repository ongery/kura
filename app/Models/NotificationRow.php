<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationRow extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'notification_rows';

    public function objecttype()
    {
        return $this->belongsTo(APDI::class, 'ObjType', 'ObjType');
    }
}
