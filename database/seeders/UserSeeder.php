<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Adel',
                'email' => 'adeliafathimah@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'manager'
            ],
            [
                'name' => 'Novi',
                'email' => 'novitrisrirahayu50@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'Lia',
                'email' => 'halethaphrodite@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'hrd'
            ],
            [
                'name' => 'Abel',
                'email' => 'abellamnda@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'staff'
            ],
            [
                'name' => 'Exsa',
                'email' => 'zalfaexsa12@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'staff'
            ],
            // [
            //     'name' => 'Exsa',
            //     'email' => 'gaje@gmail.com',
            //     'password' => bcrypt('password')
            // ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}