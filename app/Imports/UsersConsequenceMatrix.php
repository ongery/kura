<?php

namespace App\Imports;

use App\Models\ConsequenceMatrix;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersConsequenceMatrix implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ConsequenceMatrix([
            //
        ]);
    }
}
