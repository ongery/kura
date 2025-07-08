<?php

namespace App\Console\Commands;

use App\Models\APDI;
use App\Models\User;
use App\Services\Shared\DocumentsService;
use App\Services\Shared\InitialSetupService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:initial_setup';

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
            $this->comment("---------------------------------------------");
            $this->line('<fg=red;bg=yellow>     STARTING INITIAL SETUP:');
            $this->comment("---------------------------------------------");
            $this->newLine();
            $this->comment("Start processing items...");
            //Creating Models
            $modelstsJsonString = file_get_contents(base_path('resources/jsons/models.json'));
            $models = json_decode($modelstsJsonString, true);
            foreach ($models as $key => $value) {

                $this->info("Uploading: " . $value['DocumentName']);
                $this->info("Processing item id `{$key}`...");
                $Header = APDI::updateOrCreate([
                    'ObjType' => $value['ObjType'],
                ], [
                    'PermissionName' => $value['PermissionName'],
                    'DocumentName' => $value['DocumentName'],
                ]);

                (new DocumentsService())
                    ->createNumberingSeriesForAnObjType($value['ObjType'], $value['Numbering']);

            }

            $this->comment("Creating Test Users");
            $user = User::updateOrCreate([
                'email' => 'bereankibet@gmail.com',
            ], [
                'Fname' => 'Demo',
                'Lname' => "Admin",
                'BunitID' => 1,
                'password' => Hash::make('sysadmin'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ]);

            $user = User::updateOrCreate([
                'email' => 'dennokimz@gmail.com',
            ], [
                'Fname' => 'Dennis',
                'Lname' => "Kimathi",
                'BunitID' => 2,
                'password' => Hash::make('sysadmin'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

            ]);

            $this->comment("Creating Neccessary Data");
            Artisan::call('command:create_necessary_data');
            $this->comment("Creating Permission");
            Artisan::call('command:create-permission-and-roles');
            $this->comment("Creating Navigation");
            Artisan::call('command:navbar-setting');

            $this->comment("Consequence Matrix");
            (new InitialSetupService())->createConsequenceMatrix();
            $this->info("Done Creating Consequence Matrix");

            DB::commit();
        } catch (\Throwable$th) {

            DB::rollback();
            dd($th);

        }

    }
}
