<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = [
            ['gender' => 'Male'],
            ['gender' => 'Female']
        ];
        DB::table('genders')->insert($gender);
    }
}
