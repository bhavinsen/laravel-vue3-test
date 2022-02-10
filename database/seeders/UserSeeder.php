<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'remember_token' => Str::random(60),
            'password' => Hash::make('Test123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Adamin',
            'email' => 'Admin@gmail.com',
            'remember_token' => Str::random(60),
            'password' => Hash::make('Admin123'),
        ]);
    }
}
