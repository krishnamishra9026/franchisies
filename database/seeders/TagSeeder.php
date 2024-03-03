<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Generator;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Tag::create([
                'name' => $faker->text(8),
            ]);
        }
    }
}
