<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\APDI;
use App\Models\User;
use App\Services\Shared\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Helpers\CustomHelper;
use App\Models\historyLogs;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = User::with('bunit')
                ->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'Admin');
                })
                ->orderBy('id', 'desc')->get();

            return (new ApiResponseService())->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'Fname' => 'required|string|max:191',
            'Lname' => 'required|string|max:191',
            'Mobile' => 'required',
            'email' => 'required|string|email|max:191|unique:users',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                "BunitID" => $request['BunitID'],
                "Fname" => $request['Fname'],
                "Lname" => $request['Lname'],
                "Mobile" => $request['Mobile'],
                "email" => $request['email'],
                "Position" => $request['Position'],
                "password" => Hash::make(123456),
            ]);

            // $expiresAt = now()->addDay();
            // $user->sendWelcomeNotification($expiresAt);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Created Successfully");
        } catch (\Throwable$th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->first();
        $documents = APDI::get();
        foreach ($documents as $key => $value) {
            $read = Permission::where('ObjType', $value->ObjType)
                ->where('Label', 'read')
                ->first();
            $write = Permission::where('ObjType', $value->ObjType)
                ->where('Label', 'write')
                ->first();
            $update = Permission::where('ObjType', $value->ObjType)
                ->where('Label', 'update')
                ->first();

            if ($read) {
                $value->read = $data->hasPermissionTo($read->name);
            }
            if ($write) {
                $value->write = $data->hasPermissionTo($write->name);
            }
            if ($update) {
                $value->update = $data->hasPermissionTo($update->name);
            }
        }
        $data->documents = $documents;

        $allRoles = Role::get();
        foreach ($allRoles as $key => $value) {
            $value->read = $data->hasRole($value->id);
        }
        $data->allRoles = $allRoles;
        return (new ApiResponseService())->apiSuccessResponseService($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $user = User::where('id', $id)->update([
                "BunitID" => $request['BunitID'],
            ]);
            DB::commit();
            return (new ApiResponseService())->apiSuccessResponseService("Updated Successfully");
        } catch (\Throwable$th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->permissions()->detach();

            // Delete the user
            $user->delete();
            return (new ApiResponseService())->apiSuccessResponseService("Deleted Successfully");
        } catch (\Throwable$th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function updatePermission(Request $request)
    {
        $currentuser = Auth::user();

        $user = User::where('id', $request['user_id'])->first();
        $read = Permission::where('ObjType', $request['ObjType'])
            ->where('Label', 'read')
            ->first();

        $write = Permission::where('ObjType', $request['ObjType'])
            ->where('Label', 'write')
            ->first();
        $update = Permission::where('ObjType', $request['ObjType'])
            ->where('Label', 'update')
            ->first();

        $newRead = $request['read'] ? $user->givePermissionTo($read->id) :
        $user->revokePermissionTo($read->id);
        $newWrite = $request['write'] ? $user->givePermissionTo($write->id) :
        $user->revokePermissionTo($write->id);
        $newUpdarte = $request['update'] ? $user->givePermissionTo($update->id) :
        $user->revokePermissionTo($update->id);
        return (new ApiResponseService())
            ->apiSuccessResponseService($read);
    }

    public function getUserRoles()
    {
        try {
            $userRoles = Role::where('name', '!=', 'admin')->get();
            foreach ($userRoles as $key => $role) {
                $documents = APDI::get();
                foreach ($documents as $key => $value) {
                    $read = Permission::where('ObjType', $value->ObjType)
                        ->where('Label', 'read')
                        ->first();

                    $write = Permission::where('ObjType', $value->ObjType)
                        ->where('Label', 'write')
                        ->first();
                    $update = Permission::where('ObjType', $value->ObjType)
                        ->where('Label', 'update')
                        ->first();

                    if ($read) {
                        $value->read = $role->hasPermissionTo($read->name);
                    }

                    if ($write) {
                        $value->write = $role->hasPermissionTo($write->name);
                    }
                    if ($update) {
                        $value->update = $role->hasPermissionTo($update->name);
                    }
                }

                $role->documents = $documents;
                $moduleAccess = Permission::whereNull('ObjType')->get();
                foreach ($moduleAccess as $key => $module) {
                    $module->read = $role->hasPermissionTo($module->name);
                }

                $role->moduleaccess = $moduleAccess;
            }
            return (new ApiResponseService())
                ->apiSuccessResponseService($userRoles);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Create User Roles
     */
    public function createUserRoles(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        try {
            $data = Role::create([
                'name' => $request['name'],
                'guard_name' => 'web',
            ]);
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())
                ->apiFailedResponseService($th->getMessage());
        }

    }

    /**
     *  Assing Role Permissions
     *  @param  \Illuminate\Http\Request  $request
     *  @param int $request.id
     * @param int models[].id - APDI ID
     * @param int models[].Permission - 0:Not No Authorization, 1: Read Only , 2:Full Authorization
     */
    public function assignPermissionToRole(Request $request)
    {

        $role = Role::where('id', $request['id'])->first();

        if (!$role) {
            return (new ApiResponseService())->apiFailedResponseService("Role Not Found");
        }
        $documents = APDI::where('ObjType', $request['ObjType'])->get();
        foreach ($documents as $key => $value) {

            $read = Permission::where('ObjType', $value['ObjType'])
                ->where('Label', 'read')
                ->first();

            $write = Permission::where('ObjType', $value['ObjType'])
                ->where('Label', 'write')
                ->first();
            $update = Permission::where('ObjType', $value['ObjType'])
                ->where('Label', 'update')
                ->first();
            $newRead = $request['read'] ? $role->givePermissionTo($read->name) :
            $role->revokePermissionTo($read->name);

            $newWrite = $request['write'] ? $role->givePermissionTo($write->id) :
            $role->revokePermissionTo($write->id);
            $newUpdarte = $request['update'] ? $role->givePermissionTo($update->id) :
            $role->revokePermissionTo($update->id);

        }
        return (new ApiResponseService())->apiSuccessResponseService();

    }

    /**
     *  Assing Role Permissions
     *  @param  \Illuminate\Http\Request  $request
     *  @param int $request.id
     * @param int models[].id - APDI ID
     * @param int models[].Permission - 0:Not No Authorization, 1: Read Only , 2:Full Authorization
     */
    public function assignModulePermissionToRole(Request $request)
    {

        $role = Role::where('id', $request['id'])->first();

        if (!$role) {
            return (new ApiResponseService())->apiFailedResponseService("Role Not Found");
        }
        $newRead = $request['read'] ? $role->givePermissionTo($request['permission_name']) :
        $role->revokePermissionTo($request['permission_name']);

        return (new ApiResponseService())->apiSuccessResponseService();

    }

    public function assignRoleToUser(Request $request)
    {

        try {

            $user = User::where('id', request(['user_id']))->first();
            $role = Role::where('id', $request['id'])->first();

            $newRead = $request['read'] ? $user->assignRole($role->id) : $user->removeRole($role->id);
            $user->role = $role->name;
            $user->save();

            return (new ApiResponseService())->apiSuccessResponseService("Updated");
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    public function manageHistoryLogs (Request $request)
    {
        CustomHelper::userHistoryLogs($request->page_name, $request->log);
        return (new ApiResponseService())->apiSuccessResponseService("History logged");
    }

    public function getHistoryLogs()
    {
        // Fetch logs from the history_log table
        $logs = historyLogs::with(['users:id,Fname,Lname'])->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return response()->json($logs);
    }

}
