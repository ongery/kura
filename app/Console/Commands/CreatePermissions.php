<?php

namespace App\Console\Commands;

use App\Models\APDI;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-permission-and-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating Default Permission';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Default Permissions
        $actions = ['read', 'write', 'update'];

        //Get Models
        $models = APDI::get();
        foreach ($models as $key => $model) {
            $pname = $model->PermissionName;
            //creating Permission
            foreach ($actions as $key => $val) {
                $fullPName = $pname . '_' . $val;
                $fPermissionName = ucwords($val . ' ' . str_replace('_', ' ', $pname));
                $permission = Permission::updateOrcreate(
                    ['name' => $fullPName], [
                        'ObjType' => $model->ObjType,
                        'PermissionName' => $fPermissionName,
                        'Label' => $val,
                    ]
                );
                //Giving Permission to default user
                $user = User::find(1);
                $user->givePermissionTo($permission->id);

            }
        }

        $modules = ['Risk', 'QMS', 'ERM', 'CRM', 'STRATEGIC'];
        /**
         * Create Module Permission
         */

        foreach ($modules as $key => $value) {

            $permission = Permission::updateOrcreate(
                [
                    'name' => $value,
                ],
                [
                    'PermissionName' => $value,
                    'Label' => $value,
                ]
            );
        }

        /**
         * Creating Test User Roles
         */

        $allPermissions = Permission::get();
        $role = Role::UpdateOrcreate([
            'name' => "Default",
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($allPermissions);

        $user = User::where('id', 1)->first();
        $user1 = User::where('id', 2)->first();
        $user->assignRole(1);
        $user1->assignRole(1);

    }
}
