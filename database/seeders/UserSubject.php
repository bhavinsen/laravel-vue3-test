<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Subject;
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
            'user_id' => User::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
        ]);
        DB::table('usersubjects')->insert([
            'user_id' => User::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
        ]);
    }
}
