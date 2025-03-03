<?php

namespace Database\Seeders;

use App\Constants\DefaultRoles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $superUserRole = Role::where('name', DefaultRoles::SUPER_USER['key'])->first();
        $managementRole = Role::where('name', DefaultRoles::MANAGEMENT['key'])->first();
        $employeeRole = Role::where('name', DefaultRoles::EMPLOYEE['key'])->first();

        // Permissions
        $superUser = User::where('email', 'admin@admin.com')->first();
        $ceo = User::where('email', 'ceo@admin.com')->first();
        $employeeMax = User::where('email', 'max@admin.com')->first();
        $employeeMaria = User::where('email', 'maria@admin.com')->first();


        if ($superUser && $superUserRole) $superUser->assignRole($superUserRole);
        if ($ceo && $managementRole) $ceo->assignRole($managementRole);
        if ($employeeMax && $employeeRole) $employeeMax->assignRole($employeeRole);
        if ($employeeMaria && $employeeRole) $employeeMaria->assignRole($employeeRole);
    }
}
