<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePageReview;
use Faker\Generator;

class HomePageReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        HomePageReview::create([
            'title' => "Review 1",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here",
            'image' => "review-img.jpg",
            'author_name' => "Piret Luts",
            'designation' => "Co-Founder & CEO at Altron"
        ]);

        HomePageReview::create([
            'title' => "Review 2",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here",
            'image' => "review-img.jpg",
            'author_name' => "Piret Luts",
            'designation' => "Co-Founder & CEO at Altron"
        ]);

        HomePageReview::create([
            'title' => "Review 3",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here",
            'image' => "review-img.jpg",
            'author_name' => "Piret Luts",
            'designation' => "Co-Founder & CEO at Altron"
        ]);

        HomePageReview::create([
            'title' => "Review 4",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here",
            'image' => "review-img.jpg",
            'author_name' => "Piret Luts",
            'designation' => "Co-Founder & CEO at Altron"
        ]);
    }
}
