<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'fullname' => 'Admin 1',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password123'),
                'phone' => '08663636633',
                'level' => 1,
                'status' => 1,
            ],
            [
                'id' => 2,
                'fullname' => 'Sales 1',
                'username' => 'sales1',
                'email' => 'sales1@mail.com',
                'password' => Hash::make('password123'),
                'phone' => '08663636633',
                'level' => 2,
                'status' => 1,
            ],
        ]);
    }
}
