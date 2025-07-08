<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\ConsequenceScale;
use App\Models\LikelihoodScale;
use App\Models\Matrix;
use App\Models\OITM;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\ConsequenceScaleServices;
use App\Services\Transactions\RisksServices;
use Illuminate\Console\Command;

class CreateNeededDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_necessary_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $matrix = Matrix::updateOrCreate([
            "Name" => "5X5 Maxtrix",
            "LikelihoodScale" => 5,
            "ConsequenceScale" => 5,
        ]);

        $likelihoodscales = [
            [
                "Name" => "RARE",
                "Base" => 1,
                "IndicateFrequency" => "Not likely to happen within the next 5 -10 years or only in exceptional circumstances.",
                "IndicateProbability" => "Not likely to happen within the next 5 -10 years or only in exceptional circumstances (0-4%)",
            ],
            [
                "Name" => "UNLIKELY",
                "Base" => 2,
                "IndicateFrequency" => "Possible to occur within the next 1 - 5 years",
                "IndicateProbability" => "Risk event not expected to happen, however an outside chance exists (5 -24%)",
            ],
            [
                "Name" => "POSSIBLE",
                "Base" => 3,
                "IndicateFrequency" => "Possible to occur within the next 6 months - 1 year",
                "IndicateProbability" => "Risk event could potentially take place (25 – 54%)",
            ],
            [
                "Name" => "LIKELY",
                "Base" => 4,
                "IndicateFrequency" => "Likely to arise within the next 3 - 6 months",
                "IndicateProbability" => "Probable that the risk event will occur (55 – 89%)",
            ],
            [
                "Name" => "CERTAINLY",
                "Base" => 5,
                "IndicateFrequency" => "Likely to arise within the next 0 - 3 months",
                "IndicateProbability" => "Strong probability (&gt;90%) that the risk event will occur",
            ],
        ];

        foreach ($likelihoodscales as $key => $value) {
            $matrix = LikelihoodScale::updateOrCreate([
                "Base" => $value['Base'],
            ],
                [
                    "Name" => $value['Name'],
                    "IndicateFrequency" => $value['IndicateFrequency'],
                    "IndicateProbability" => $value['IndicateProbability'],
                ]);

        }

        $consscales = [
            "LOW", "MINOR", "MODERATE", "MAJOR", "CATASTOPHIC",
        ];

        //
        foreach ($consscales as $key => $value) {
            $cscale = ConsequenceScale::updateOrCreate([
                "Base" => $key + 1,
                "Name" => $value,
            ]);
        }

        $actions = [
            "RISK ANALYSIS ACTION", "CORRECTIVE ACTION",
            "MANAGEMENT ACTION", "BOARD ACTION",
            "OPPORTUNITY ACTION", "IMPROVEMENT ACTION",
            "COVID-19 ACTION", "GOVERNANCE ACTION",
        ];

        foreach ($actions as $key => $value) {
            $cscale = Category::updateOrCreate([
                "Name" => $value,
                "ObjType" => 18,
            ]);
        }

        $categories = [21, 15, 5, 2, 3, 1];

        foreach ($categories as $key => $value) {
            $newData = Category::updateOrCreate([
                "Name" => "Default",
                "ObjType" => $value,
            ]);
        }

        $scaleGroups = [
            "Financial",
            "Construction/Roads Project",
            "Projects Implementation",
            "Human Capital (HR); OHS",
            "Compliance, Governance & Legal",
            "Security (Information and Physical Security",
        ];

        foreach ($scaleGroups as $key => $value) {
            $DocNum = (new DocumentsService())->documentNumembering(10);
            $newData = OITM::updateOrCreate([
                "Name" => $value,
                "ObjType" => 10,
            ], [
                'DocNum' => $DocNum,
                "description" => $value,
            ]);

            (new DocumentsService())->updateNumbering(10);
            (new ConsequenceScaleServices())->createConsequenceScale($newData->id);
            (new RisksServices())->addScaleGroupToRisk($newData->id);
        }

        $this->info("Finished creating Neccessary Data");

    }

}
