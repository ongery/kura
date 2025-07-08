<?php

namespace App\Console\Commands;

use App\Imports\RisksImport;
use App\Models\ActionTracking;
use App\Models\BUNIT;
use App\Models\Category;
use App\Models\OITM;
use App\Models\OKRI;
use App\Models\ORISK;
use App\Models\RISK2;
use App\Models\User;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\KeyRiskIndicatorService;
use App\Services\Transactions\RisksServices;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImporterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import-doc {ExcelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing Risks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $ExcelName = $this->argument('ExcelName');
        $this->comment("---------------------------------------------");
        $this->line('<fg=red;bg=yellow>     STARTING UPLOAD:');
        $this->comment("---------------------------------------------");
        $this->newLine();
        $array = Excel::toCollection(new RisksImport, $ExcelName . ".xlsx", 'local');
        DB::beginTransaction();
        try {
            dd("Done");
            foreach ($array as $key => $val) {
                $dataImports = $val;

                foreach ($dataImports as $key => $doc) {

                    if ($doc[0] == null || $doc[37] == null || $doc[31] == null) {
                        continue;
                    }

                    $newbunit = BUNIT::updateOrcreate([
                        "Name" => $doc[0],
                        "Acronym" => $doc[0],
                    ]);

                    $BunitID = $newbunit->id;
                    $RiskName = $doc[1];
                    $RiskSource = $doc[2];
                    $RiskEffects = $doc[3];
                    $ExistingControl = $doc[16];
                    $ActionTracking = $doc[27];

                    /**
                     * Adding RISK EVENT
                     */

                    //Getting Risk Event Category

                    $CategoryID = $this->fetchDefaultCategory(2);
                    $riskEventID = $this->creatingRiskEventSetup(8, $RiskName, $CategoryID, $BunitID);
                    //Hanlding

                    //  $importHandleRanking = $this->riskRanking(1, $riskEventID, $doc);
                    /**
                     * Adding RISK Source
                     */

                    //Getting Risk Source Category

                    $CategoryID = $this->fetchDefaultCategory(1);
                    $riskSourceID = $this->creatingRiskSetup(7, $RiskSource, $CategoryID, $BunitID);

                    /**
                     * Adding RISK Effects
                     */

                    //Getting Risk Effects Category
                    $CategoryID = $this->fetchDefaultCategory(3);
                    $riskEffectsID = $this->creatingRiskSetup(9, $RiskEffects, $CategoryID, $BunitID);

                    /**
                     * Adding Existing Control
                     */

                    //Getting Risk Effects Category
                    $CategoryID = $this->fetchDefaultCategory(15);
                    $riskExistingID = $this->creatingRiskSetup(16, $ExistingControl, $CategoryID, $BunitID);

                    /**
                     * Adding Actiong Tracking
                     */
                    $CategoryID = $this->fetchDefaultCategory(18);
                    $this->createActionTracking(19, $riskEventID, $CategoryID, $ActionTracking);

                    /**
                     * Creating KRI
                     *
                     */

                    $this->LinkRiskCauseWithRisk(7, $riskEventID, $riskSourceID);
                    $this->LinkRiskCauseWithRisk(9, $riskEventID, $riskEffectsID);
                    $this->LinkRiskCauseWithRisk(16, $riskEventID, $riskExistingID);

                    $this->creatingkeyRiskIndicators($doc);
                    $this->creatingCompliance($doc);

                    //Handle Ranking

                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    public function fetchDefaultCategory($ObjType): int
    {

        $data = Category::where('ObjType', $ObjType)->first();
        return $data->id;
    }

    public function creatingRiskSetup($ObjType, $Name, $CategoryID, $BunitID)
    {

        if ($Name) {
            $allItems = explode(";", $Name);
            $itemsID = [];
            foreach ($allItems as $key => $item) {
                if ($item) {
                    $DocNum = (new DocumentsService())->documentNumembering($ObjType);
                    $newData = OITM::firstOrCreate([
                        "Name" => $item,
                        "ObjType" => $ObjType,
                    ], [
                        'DocNum' => $DocNum,
                        "description" => $item,
                        "CategoryID" => $CategoryID,
                    ]);

                    (new DocumentsService())->updateNumbering($ObjType);
                    array_push($itemsID, $newData->id);
                }
            }

            return $itemsID;

        }

    }

    public function creatingRiskEventSetup($ObjType, $Name, $CategoryID, $BunitID)
    {

        if ($Name) {
            $DocNum = (new DocumentsService())->documentNumembering($ObjType);
            $newData = OITM::firstOrCreate([
                "Name" => $Name,
                "ObjType" => $ObjType,
            ], [
                'DocNum' => $DocNum,
                "description" => $Name,
                'BunitID' => $BunitID,
                "CategoryID" => $CategoryID,
            ]);

            (new DocumentsService())->updateNumbering($ObjType);

            $DocNum = (new DocumentsService())->documentNumembering(11);
            $newRisk = ORISK::firstOrCreate([
                'BunitID' => $BunitID,
                "o_i_t_m_id" => $newData->id,
                "ObjType" => 11,
            ], [
                'DocNum' => $DocNum,
            ]);
            (new RisksServices())->createInherentConsequence($newRisk->id);
            (new DocumentsService())->updateNumbering(11);

            return $newRisk->id;

        }

    }
    private function LinkRiskCauseWithRisk(int $ObjType, int $RiskID, array $ItemIDs)
    {

        foreach ($ItemIDs as $key => $ItemID) {
            $risk = ORISK::where('id', $RiskID)->first();
            $risk->causesimpact()->attach($ItemID, ['ObjType' => $ObjType]);
        }

    }

    private function createActionTracking(int $ObjType, int $RiskID, int $CategoryID, $Name): void
    {
        if ($Name) {
            $riskData = ORISK::where('id', $RiskID)->first();
            $DocNum = (new DocumentsService())->documentNumembering($ObjType);
            $newData = ActionTracking::firstOrCreate(
                [
                    "Name" => $Name,
                    "Description" => $Name,
                ],
                [
                    "DocNum" => $DocNum,
                    'o_r_i_s_k_id' => $RiskID,
                    "ObjType" => 19,
                    "Category" => $CategoryID,
                    "DueDate" => Carbon::now(),
                    "Status" => 0,

                    "Rating" => 1,
                    'user_id' => 1, //Supervisor
                ]
            );

            $users = User::where('BunitID', $riskData->BunitID)->pluck('id');

            $newData->users()->sync($users);

            (new DocumentsService())->updateNumbering($ObjType);
        }

    }

    public function creatingkeyRiskIndicators($doc): void
    {

        $ObjType = 17;
        $CategoryID = $this->fetchDefaultCategory(5);
        $DocNum = (new DocumentsService())->documentNumembering($ObjType);
        $mainRiskEvent = OITM::where("Name", $doc[1])->first();

        $frequency = "M";
        if ($doc[36]) {
            $freq = ucfirst(str_replace(' ', '', $doc[36]));
            $frequency = (new KeyRiskIndicatorService())->mapFrequency($freq);
        }

        $GreenAmber = (int) $doc[32];
        $AmberRed = (int) $doc[33];

        $newData = OKRI::firstOrCreate([
            'Name' => $doc[31],
            'description' => $doc[31],
        ], [
            'DocNum' => $DocNum,
            "ObjType" => $ObjType,
            'o_i_t_m_id' => $mainRiskEvent->id,
            'CategoryID' => $CategoryID,
            'Weight' => 1,
            'Frequency' => $frequency,
            'StartDate' => Carbon::now(),
            'ExpiredDate' => null,
            'DataType' => 1,
            'LowerLimit' => $GreenAmber > $AmberRed ? $GreenAmber + 50 : 0,
            'GreenAmber' => (int) $doc[32],
            'AmberRed' => (int) $doc[33],
            'UpperLimit' => $GreenAmber > $AmberRed ? 0 : $AmberRed + 50,
        ]);

        $users = User::where('BunitID', $mainRiskEvent->BunitID)->pluck('id');

        $newData->users()->sync($users);

        (new DocumentsService())->updateNumbering($ObjType);

    }

    public function creatingCompliance($doc): void
    {

        $ObjType = 20;
        $CategoryID = $this->fetchDefaultCategory(21);
        $DocNum = (new DocumentsService())->documentNumembering($ObjType);
        $mainRiskEvent = OITM::where("Name", $doc[1])->first();

        $newData = OKRI::firstOrCreate([
            'Name' => $doc[37],
            'description' => $doc[37],
        ],
            [
                'DocNum' => $DocNum,
                "ObjType" => $ObjType,
                'o_i_t_m_id' => $mainRiskEvent->id,
                'CategoryID' => $CategoryID,

                'Weight' => 1,
                'Frequency' => "Q",
                'StartDate' => Carbon::now(),
            ]);

        $users = User::where('BunitID', $mainRiskEvent->BunitID)->pluck('id');

        $newData->users()->sync($users);

        (new DocumentsService())->updateNumbering($ObjType);

    }

    /**
     * Handling Risk Ranking
     */

    public function riskRanking(int $type, int $riskID, $doc): void
    {

        $financial = $doc[7];
        $Construction = $doc[8];
        $ProjectsImplementation = $doc[9];
        $HumanCapital = $doc[10];
        $Reputation = $doc[11];
        $Compliance = $doc[12];
        $Security = $doc[13];

        // "Financial",
        // "Construction/Roads Project",
        // "Projects Implementation",
        // "Human Capital (HR); OHS",
        // "Compliance, Governance & Legal",
        // "Security (Information and Physical Security",
        $dataRISK2 = RISK2::with('item.itm1')
            ->where('ObjType', 24)
            ->where("o_r_i_s_k_id", $riskID)
            ->orderBy('o_i_t_m_id', 'asc')
            ->get();

        foreach ($dataRISK2 as $key => $data) {

            if ($financial && $data->item->description = 'Financial') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $financial)->first();

                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }
            if ($Construction && $data->item->description = 'Construction/Roads Project') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $Construction)->first();
                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }
            if ($ProjectsImplementation && $data->item->description = 'Projects Implementation') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $ProjectsImplementation)->first();
                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }
            if ($HumanCapital && $data->item->description = 'Human Capital (HR); OHS') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $HumanCapital)->first();
                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }
            if ($Compliance && $data->item->description = 'Compliance, Governance & Legal') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $Compliance)->first();
                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }

            if ($Security && $data->item->description = 'Security (Information and Physical Security') {
                $itm1DataFinancial = $data->item->itm1->where('Base', $Security)->first();
                RISK2::where('id', $data->id)
                    ->update([
                        "i_t_m_1_id" => $itm1DataFinancial->id,
                    ]);
            }
        }

    }

}
