<?php

namespace Database\Seeders;

use App\Constants\DefaultRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole(DefaultRoles::SUPER_USER);
        $this->createRole(DefaultRoles::MANAGEMENT);
        $this->createRole(DefaultRoles::EMPLOYEE);
    }

    private function createRole($role)
    {
        $exists = Role::where('name', $role['key'])->exists();
        if (!$exists) Role::create(['id' =>  Uuid::uuid4(), 'title' => $role['title'], 'description' => $role['description'], 'name' => $role['key'], 'guard_name' => $role['guard']]);
    }
}
