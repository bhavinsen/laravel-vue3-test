<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'Test@gmail.com',
            'password' => Hash::make('Test123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Adamin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('Admin123'),
        ]);
    }
}
