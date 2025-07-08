<?php

namespace App\Console\Commands;

use App\Models\ConsequenceMatrix;
use App\Models\OKRI;
use App\Services\Shared\DocumentsService;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-place';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $maxtrixJsonString = file_get_contents(base_path('resources/jsons/matrix.json'));
        $maxtrix = json_decode($maxtrixJsonString, true);

        foreach ($maxtrix as $key => $value) {
            $this->comment("Creating Consequence Matrix: " . $value['Impact Measure']);
            ConsequenceMatrix::create([
                "ImpactMeasure" => $value['Impact Measure'],
                "Fundamental" => $value['Fundamental'] ?? null,
                'Major' => $value['Major'] ?? null,
                "Moderate" => $value['Moderate'] ?? null,
                "Minor" => $value['Minor'] ?? null,
                "Insignificant" => $value['Insignificant'] ?? null,
            ]);
        }
        // $user = User::updateOrCreate([
        //     'email' => 'nkenn2014@gmail.com',
        // ], [
        //     'Fname' => 'KENNEDY',
        //     'Lname' => "MBOGO",
        //     'BunitID' => 3,
        //     'password' => "$2y$10\$S91FyAMllZsHfBrcZn0h9.CqiwvXqLl2BMK/foygTLSGQlxMM2cni",
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),

        // ]);

        // $user = User::updateOrCreate([
        //     'email' => 'kilsona47@gmail.com',
        // ], [
        //     'Fname' => 'Amor',
        //     'Lname' => "Kil",
        //     'BunitID' => 4,
        //     'password' => "$2y$10\$cFQ98QtuUPQBpT3Vcb5Ft.1KFcFjCA9.Tf9E7sR53/hohEF2Yq48i",
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),

        // ]);

    }

    public function fetching($kriId, $totalValue)
    {

        $this->info("LOWER LIMIT: ");

        (new DocumentsService())
            ->createNumberingSeriesForAnObjType(41, "PO");

        dd("Done");

        // DataType
        // LowerLimit
        //AmberRed
        // GreenAmber
        // UpperLimit

        $data = OKRI::with('kri1', 'item')->where('id', $kriId)
            ->first();

        $LowerLimit = $data->LowerLimit;
        $GreenAmber = $data->GreenAmber;
        $AmberRed = $data->AmberRed;
        $UpperLimit = $data->UpperLimit;

        $this->info("LOWER LIMIT: " . $LowerLimit);
        $this->info("Green Amber: " . $GreenAmber);
        $this->info("AmberRed: " . $AmberRed);
        $this->info("UpperLimit : " . $UpperLimit);

        $bgColor = null;
        if ($LowerLimit > $UpperLimit) {

            if ($totalValue >= $GreenAmber) {
                $bgColor = 'green';
            }

            if ($totalValue > $AmberRed) {
                $bgColor = 'yellow';
            }

            if ($totalValue < $AmberRed) {
                $bgColor = 'red';
            }

            return $bgColor;
        }

        if ($LowerLimit < $UpperLimit) {

            if ($totalValue < $GreenAmber) {
                $bgColor = 'green';
            }

            if ($totalValue >= $GreenAmber) {
                $bgColor = 'yellow';
            }
            if ($totalValue > $AmberRed) {
                $bgColor = 'red';
            }

            return $bgColor;
        }
    }
}
