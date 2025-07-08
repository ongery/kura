<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'categories';

    protected $appends = array('type');
    public function getTypeAttribute()
    {

        // <option value="O">Risk Source Category</option>
        // <option value="2">Risk Event Category</option>
        // <option value="3">Risk Impact Category</option>
        // <option value="4">Consequence Scale Group Category</option>
        // <option value="5">KRI Item Category</option>
        // <option value="15">Control Items Category</option>
        // <option value="21">Compliance Category</option>

        if ($this->ObjType == 1) {
            return "Risk Source Category";
        }

        if ($this->ObjType == 2) {
            return "Risk Event Category";
        }

        if ($this->ObjType == 3) {
            return "Risk Impact Category";
        }

        if ($this->ObjType == 4) {
            return "Consequence Scale Group Category";
        }

        if ($this->ObjType == 5) {
            return "KRI Item Category";
        }

        if ($this->ObjType == 15) {
            return "Control Items Category";
        }

        if ($this->ObjType == 21) {
            return "Compliance Category";
        }

    }
}
