<?php
namespace App\Services\Shared;

use App\Models\ConsequenceMatrix;

class InitialSetupService
{

    /**
     *
     * CREATING CONSEQUENCE MATRIX
     *
     */
    public function createConsequenceMatrix()
    {
        $maxtrixJsonString = file_get_contents(base_path('resources/jsons/matrix.json'));
        $maxtrix = json_decode($maxtrixJsonString, true);

        foreach ($maxtrix as $key => $value) {
            ConsequenceMatrix::create([
                "ImpactMeasure" => $value['Impact Measure'],
                "Fundamental" => $value['Fundamental'] ?? null,
                'Major' => $value['Major'] ?? null,
                "Moderate" => $value['Moderate'] ?? null,
                "Minor" => $value['Minor'] ?? null,
                "Insignificant" => $value['Insignificant'] ?? null,
            ]);

        }
    }
}
