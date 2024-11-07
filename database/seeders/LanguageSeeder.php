<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'English',
            ],
            [
                'name' => 'Bulgarian',
            ]
        ];

        foreach ($data as $lang) {
            $language = new Language();
            $language->name = $lang['name'];
            $language->save();
        }
    }
}
