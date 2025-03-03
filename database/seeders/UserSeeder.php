<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = $this->createUser('Super', 'User', 'Geschäftsführung', 'admin@admin.com', 'adminadmin');
        $ceo = $this->createUser('Wolfgang', 'Mustermann', 'Geschäftsführung', 'ceo@admin.com', 'wolfgangwolfgang');
        $employeeMax = $this->createUser('Max', 'Mustermann', 'Kalkulation', 'max@admin.com', 'maxmax');
        $employeeMaria = $this->createUser('Maria', 'Mustermann', 'Buchhaltung', 'maria@admin.com', 'mariamaria');
    }

    private function createUser($firstname, $lastname, $department, $email, $passwort)
    {
        $exists = User::where('email', $email)->exists();
        if (!$exists) {
            $user = new User();
            $user->id = Uuid::uuid4();
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->department = $department;
            $user->email = $email;
            $user->password =  Hash::make($passwort);

            $saved = $user->save();

            if ($saved) $user->markEmailAsVerified();

            return $user;
        }
    }
}
