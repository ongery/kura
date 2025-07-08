<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ORISK;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionTracking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'action_trackings';

    protected $appends = array('freq', 'color');
    public function riskcauses()
    {
        return $this->belongsToMany(OITM::class, 'r_i_s_k3_s');
    }

    public function riskevent()
    {
        return $this->belongsTo(ORISK::class, 'o_r_i_s_k_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'r_i_s_k4_s');
    }

    public function activityusers()
    {
        return $this->belongsToMany(User::class, 'r_i_s_k4_s')->where('ObjType', 42);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category');
    }
    
    public function milestone()
    {
        return $this->hasMany(ActionMilestone::class, 'action_id');
    }

    public function getFreqAttribute()
    {
        if ($this->Status == 0) {
            return "Not Started (Not Due)";
        }
        if ($this->Status == 1) {
            return "WIP (On Course)";
        }
        if ($this->Status == 2) {
            return "WIP (Overdue)";
        }
        if ($this->Status == 3) {
            return "Not Started (Overdue)";
        }
        if ($this->Status == 4) {
            return "Deffered";
        }
        if ($this->Status == 5) {
            return "Completed";
        }
    }
    public function getColorAttribute()
    {
        if ($this->Status == 0) {
            return "bg-blue";
        }
        if ($this->Status == 1) {
            return "bg-yellow";
        }
        if ($this->Status == 2) {
            return "bg-warning";
        }
        if ($this->Status == 3) {
            return "bg-danger";
        }
        if ($this->Status == 4) {
            return "bg-white";
        }
        if ($this->Status == 5) {
            return "bg-success";
        }
    }
}
