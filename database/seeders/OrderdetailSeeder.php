<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class OrderdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('orderdetail')->insert([
                'order_id' => rand(1, 10),
                'product_id' => rand(1, 20),
                'price' => rand(50, 500),
                'qty' => rand(1, 5),
                'amount' => rand(100, 1000),
            ]);
        }
    }
}
