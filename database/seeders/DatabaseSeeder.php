<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // roles
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ]
        ]);

        $adminRole = Role::where('name', '=', 'Admin')->firstOrFail(); // find admin role

        // default admin user
        DB::table('users')->insert([
            'role_id' => $adminRole['id'],
            'name' => 'Aldo Rodríguez',
            'email' => 'aarcaldo@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
