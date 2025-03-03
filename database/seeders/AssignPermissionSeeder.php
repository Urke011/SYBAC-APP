<?php

namespace Database\Seeders;

use App\Constants\DefaultRoles;
use App\Constants\Permissions;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;



class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $superUser = Role::where('name', DefaultRoles::SUPER_USER['key'])->first();
        $management = Role::where('name', DefaultRoles::MANAGEMENT['key'])->first();
        $employee = Role::where('name', DefaultRoles::EMPLOYEE['key'])->first();

        // Permissions
        $permissions = Permission::all();
        $employeePermissionKeys = array_filter(array_map(
            function ($permission) {
                if(!in_array($permission['key'], [
                    Permissions::getPermissionKey(Permissions::ACCESS_BACKEND),
                    Permissions::getPermissionKey(Permissions::ACCESS_USERS),
                    Permissions::getPermissionKey(Permissions::ACCESS_ROLES),
                    Permissions::getPermissionKey(Permissions::CREATE_USER),
                    Permissions::getPermissionKey(Permissions::CREATE_ROLE),
                    Permissions::getPermissionKey(Permissions::READ_ROLES),
                    Permissions::getPermissionKey(Permissions::READ_ROLE),
                    Permissions::getPermissionKey(Permissions::READ_USER),
                    Permissions::getPermissionKey(Permissions::READ_USERS),
                    Permissions::getPermissionKey(Permissions::UPDATE_USER),
                    Permissions::getPermissionKey(Permissions::UPDATE_ROLE),
                    Permissions::getPermissionKey(Permissions::DELETE_ROLE),
                    Permissions::getPermissionKey(Permissions::DELETE_USER),
                ])) {
                    return Permissions::getPermissionKey($permission);
                }
        }, Permissions::getAllSystemPermissions()), fn($value) => $value != null);


        $employeePermissions = Permission::whereIn('name', $employeePermissionKeys)->get();

        if ($superUser) $superUser->syncPermissions($permissions);
        if ($management) $management->syncPermissions($permissions);
        if ($employee) $employee->givePermissionTo($employeePermissions);
    }
}
