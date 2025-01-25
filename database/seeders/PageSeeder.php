<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['title' => 'Home'],
            ['title' => 'About Us'],
            ['title' => 'Our Services'],
            ['title' => 'Team'],
            ['title' => 'For Business'],
            ['title' => 'Blog'],
            ['title' => 'Contact Us'],
        ];

        foreach ($pages as $page) {
            \App\Models\Page::create($page);
        }
    }
}
