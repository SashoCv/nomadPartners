<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PartnerSeeder::class,
            HomeSeeder::class,
            BlogSeeder::class,
            BlogCategorySeeder::class,
            AboutUsSeeder::class,
        ]);
    }
}
