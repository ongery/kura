<?php

namespace App\Console\Commands;

use App\Models\OITM;
use App\Models\ORISK;
use App\Services\Shared\DocumentsService;
use App\Services\Transactions\RisksServices;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportERM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:erm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        DB::beginTransaction();
        try {
            $warehouseJsonString = file_get_contents(base_path('resources/jsons/erm.json'));
            $accounts = json_decode($warehouseJsonString, true);
            foreach ($accounts as $key => $value) {
                $DocNum = (new DocumentsService())->documentNumembering(22);
                $newDataItem = OITM::updateOrCreate([
                    'DocNum' => $DocNum,
                    "Name" => $value['Name'],
                    "ObjType" => 22,
                    "description" => $value['Name'],
                ]);

                (new DocumentsService())->updateNumbering(22);
                $DocNum = (new DocumentsService())->documentNumembering(23);
                $newData = ORISK::updateOrCreate([
                    "o_i_t_m_id" => $newDataItem->id,
                    "ObjType" => 23,
                ], [
                    'BunitID' => rand(1, 6),
                    'DocNum' => $DocNum,

                ]);

                (new DocumentsService())->updateNumbering(23);
                (new RisksServices())->createInherentConsequence($newData->id);

            }

            DB::commit();
        } catch (\Throwable$th) {
            DB::rollback();
            dd($th);
        }

    }
}
