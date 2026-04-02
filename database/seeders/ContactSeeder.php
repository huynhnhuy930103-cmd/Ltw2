<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('contact')->insert([
                'user_id' => rand(1, 10),
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'phone' => '09000000' . $i,
                'title' => 'Liên hệ ' . $i,
                'content' => 'Nội dung liên hệ ' . $i,
                'replay_id' => 0,
                'updated_by' => null,
                'status' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
