<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('order')->insert([
                'user_id' => rand(1, 10),
                'name' => 'User ' . $i,
                'phone' => '09000000' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'address' => 'Địa chỉ ' . $i,
                'note' => 'Ghi chú ' . $i,
                'total_amount' => rand(100, 1000),
                'updated_by' => null,
                'status' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
