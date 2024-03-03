<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePageSetting;
use Faker\Generator;

class HomePageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        HomePageSetting::create([
            'meta_title' => 'WinWinPromo',
            'meta_description' => 'WinWinPromo',
            'page_title' => 'WinWinPromo',
            'works_title1' => 'Search Creator',
            'works_description1' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'works_image1' => 'work1.jpg',
            'works_title2' => 'Purchase Collabs',
            'works_description2' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'works_image2' => 'work2.jpg',
            'works_title3' => 'Get Personal Details',
            'works_description3' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'works_image3' => 'work3.jpg',
            'works_title4' => 'Chat & Make a Deal',
            'works_description4' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'works_image4' => 'work4.jpg',
            'banner1_title' => 'Find the talent needed to get your Business growing.',
            'banner1_button_text' => 'Get Started',
            'banner1_button_bg_color' => '',
            'banner1_button_text_color' => '',
            'banner1_image' => 'banner-1.png',
            'banner2_title' => "Learn What 'name' can do for you",
            'banner2_description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour',
            'banner2_button_text' => 'Contact Us',
            'banner2_button_bg_color' => '',
            'banner2_button_text_color' => '',
            'banner2_image' => 'banner-2.jpg',
            'title1' => 'High Quality Content',
            'description1' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'image' => 'less.png',
            'title2' => 'A level above',
            'description2' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'title3' => 'High Quality Content',
            'description3' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
            'title4' => 'A level above',
            'description4' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
        ]);
    }
}
