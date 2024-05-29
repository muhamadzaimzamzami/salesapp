<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_store')->insert([
            [
                'id' => 1,
                'name' => 'Toko ABC',
                'owner' => 'Owner 1',
                'phone' => '08532525252',
                'address' => 'Jakarta',
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Toko XYZ',
                'owner' => 'Owner 2',
                'phone' => '08532525252',
                'address' => 'Jakarta',
                'status' => 1,
            ],
            
            
        ]);
    }
}
