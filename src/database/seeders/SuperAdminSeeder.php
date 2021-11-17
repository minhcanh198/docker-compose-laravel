<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::firstOrCreate(['email' => 'superadmin@mail'], [
            'title' => 'Mr.',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@mail',
            'phone_number' => '0987654321',
            'password' => Hash::make('admin123')
        ]);
        $superAdmin->assignRole('superadmin');
    }
}
