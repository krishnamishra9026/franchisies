<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePageService;
use Faker\Generator;

class HomePageServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        HomePageService::create([
            'title' => "Pets & Animals",
            'image' => "service1.png",
        ]);

        HomePageService::create([
            'title' => "Music",
            'image' => "service2.png",
        ]);

        HomePageService::create([
            'title' => "Education",
            'image' => "service3.png",
        ]);

        HomePageService::create([
            'title' => "Gaming",
            'image' => "service4.png",
        ]);


        HomePageService::create([
            'title' => "Film & Animation",
            'image' => "service5.png",
        ]);
    }
}
