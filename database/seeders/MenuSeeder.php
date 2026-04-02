<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('menu')->insert([
                'name' => 'Menu ' . $i,
                'link' => '/menu-' . $i,
                'position' => $i % 2 == 0 ? 'mainmenu' : 'footermenu',
                'table_id' => null,
                'parent_id' => 0,
                'type' => 'custom',
                'sort_order' => $i,
                'created_by' => 1,
                'updated_by' => null,
                'status' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
