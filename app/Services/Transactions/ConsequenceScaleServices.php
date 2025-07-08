<?php

namespace App\Services\Transactions;

use App\Models\ConsequenceScale;
use App\Models\ITM1;

/**
 * Service for Marke
 */
class ConsequenceScaleServices
{
    /**
     *  Creating Consequence Scale for Consequence Scale Group
     * @return \Illuminate\Http\Response
     */
    public function createConsequenceScale($ScaleGroup)
    {
        $ConsequenceScale = ConsequenceScale::get();
        foreach ($ConsequenceScale as $key => $value) {
            $itm1 = ITM1::create([
                "Base" => $value['Base'],
                "Name" => $value['Name'],
                "ScaleID" => $value->id,
                "o_i_t_m_id" => $ScaleGroup,
            ]);
        }

    }
}
