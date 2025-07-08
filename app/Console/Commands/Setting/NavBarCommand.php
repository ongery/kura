<?php

namespace App\Console\Commands\Setting;

use App\Models\NavBar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NavBarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:navbar-setting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Navbar Setting';

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

        $menuJsonString = file_get_contents(base_path('resources/jsons/menu_items.json'));
        $menuitems = json_decode($menuJsonString, true);

        DB::beginTransaction();
        try {

            foreach ($menuitems as $key => $item1) {
                $menu1 = NavBar::updateOrCreate([
                    'Label' => $item1['Label'],
                    'Visible' => $item1['Visible'],
                    'Color' => $item1['Color'],
                    'Order' => $item1['Order'],
                    'Icon' => $item1['Icon'],
                    'Link' => $item1['Link'],
                ]);

                foreach ($item1['children'] as $key => $item1) {
                    $order = $key + 1;
                    $menu2 = NavBar::updateOrCreate([
                        'Link' => $item1['Link'],
                        'ParentID' => $menu1->id,
                    ], [
                        'Label' => $item1['Label'],
                        'Visible' => $item1['Visible'],
                        'Color' => $item1['Color'],
                        'Order' => $order,
                        'Icon' => $item1['Icon'],
                    ]);

                    foreach ($item1['children'] as $key => $item2) {
                        $order = $key + 1;
                        $menu2 = NavBar::updateOrCreate([
                            'Link' => $item2['Link'],
                            'ParentID' => $menu2->id,
                        ], [
                            'Label' => $item2['Label'],
                            'Visible' => $item2['Visible'],
                            'Color' => $item2['Color'],
                            'Order' => $order,
                            'Icon' => $item2['Icon'],
                        ]);

                    }

                }

            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }

    }
}
