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
        $users = [
            [
                'id'=> 1,
                'role_id' => 1,
                'gender_id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Binus',
                'email' => 'adminbinus@gmail.com',
                "image" => "profile.jpg",
                'password' => Hash::make('admin123'),
            ],

            [
                'id'=> 2,
                'role_id' => 2,
                'gender_id' => 1,
                'first_name' => 'Mahasiswa',
                'last_name' => 'Binus',
                'email' => 'mahasiswabinus@gmail.com',
                "image" => "rh.jpg",
                'password' => Hash::make('12345678'),
            ],

            [
                'id'=> 3,
                'role_id' => 2,
                'gender_id' => 2,
                'first_name' => 'binusian',
                'last_name' => '2024',
                'email' => 'binusian@gmail.com',
                "image" => "rh.jpg",
                'password' => Hash::make('12345678'),
            ],
            [
                'id'=> 4,
                'role_id' => 1,
                'gender_id' => 1,
                'first_name' => 'lsc',
                'last_name' => 'admin',
                'email' => 'lsc@gmail.com',
                "image" => "profile.jpg",
                'password' => Hash::make('12345678'),
            ],

        ];

        DB::table('users')->insert($users);
    }
}
