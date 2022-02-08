<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Administrator',
        ]);

        DB::table('subjects')->insert([
            'name' => 'Human Resource Manager',
        ]);

        DB::table('subjects')->insert([
            'name' => 'Human Resource Specialist',
        ]);


        DB::table('usersubjects')->insert([
            'user_id' => 1,
            'subject_id' => 3,
        ]);
        DB::table('usersubjects')->insert([
            'user_id' => 3,
            'subject_id' => 1,
        ]);
    }
}
