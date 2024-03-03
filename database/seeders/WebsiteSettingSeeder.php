<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;
use Faker\Generator;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

            WebsiteSetting::create([
                'logo' => 'winlogo-white.png',
                'footer_logo' => 'winlogo-black.png',
                'copyright_text' => 'Winwinpromo 2023',
                'facebook_link' => '',
                'instagram_link' => '',
                'youtube_link' => '',
                'tiktok_link' => '',
                'twitter_link' => '',

            ]);
    }
}
