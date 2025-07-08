<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionMilestone extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'action_milestones';

    protected $fillable = [
        'action_id', 'milestone_name', 'due_date', 'status', 'attachment'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
