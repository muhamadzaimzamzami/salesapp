<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_product')->insert([
            [
                'id' => 1,
                'product_name' => 'BoBae Puree ACM',
                'category' => 1,
                'barcode' => '0725765175700',
                'price_onCartoon' => 464000,
                'price_onPieces' => 29000,
                'weight' => '16 x 80gr',
                'image' => 'product.png',
                'stock' => 100,
                'status' => 1,
            ],
            [
                'id' => 2,
                'product_name' => 'BoBae Puree ABC',
                'category' => 1,
                'barcode' => '0725765175700',
                'price_onCartoon' => 464000,
                'price_onPieces' => 29000,
                'weight' => '16 x 80gr',
                'image' => 'product.png',
                'stock' => 100,
                'status' => 1,
            ],
            [
                'id' => 3,
                'product_name' => 'BoBae Puree DEF',
                'category' => 1,
                'barcode' => '0725765175700',
                'price_onCartoon' => 464000,
                'price_onPieces' => 29000,
                'weight' => '16 x 80gr',
                'image' => 'product.png',
                'stock' => 100,
                'status' => 1,
            ],
            [
                'id' => 4,
                'product_name' => 'BoBae Puree GHI',
                'category' => 1,
                'barcode' => '0725765175700',
                'price_onCartoon' => 464000,
                'price_onPieces' => 29000,
                'weight' => '16 x 80gr',
                'image' => 'product.png',
                'stock' => 100,
                'status' => 1,
            ],
            [
                'id' => 5,
                'product_name' => 'BoBae Puree JKL',
                'category' => 1,
                'barcode' => '0725765175700',
                'price_onCartoon' => 464000,
                'price_onPieces' => 29000,
                'weight' => '16 x 80gr',
                'image' => 'product.png',
                'stock' => 100,
                'status' => 1,
            ],
        ]);
    }
}
