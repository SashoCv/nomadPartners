<?php

namespace Database\Seeders;

use App\Http\Controllers\HomeController;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            AboutUsSeeder::class
        ]);
    }
}
