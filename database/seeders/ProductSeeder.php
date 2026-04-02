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
        for ($i = 1; $i <= 40; $i++) {
            DB::table('product')->insert([
                'category_id' => rand(1, 10),
                'brand_id' => rand(1, 10),
                'name' => 'Product ' . $i,
                'slug' => 'product-' . $i,
                'price_buy' => rand(100, 500),
                'price_sale' => rand(50, 300),
                'image' => 'product' . $i . '.png',
                'qty' => rand(1, 100),
                'detail' => 'Chi tiết sản phẩm ' . $i,
                'description' => 'Mô tả sản phẩm ' . $i,
                'created_by' => 1,
                'updated_by' => null,
                'status' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
