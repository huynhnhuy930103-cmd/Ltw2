<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            TopicSeeder::class,
            PostSeeder::class,
            MenuSeeder::class,
            ContactSeeder::class,
            OrderSeeder::class,
            OrderdetailSeeder::class,
        ]);
    }
}
