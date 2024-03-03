<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Category::create([
                'name' => 'Category ' . $i,
                'meta_title' => $faker->text(8),
                'meta_description' => $faker->paragraph,
            ]);
        }
    }
}
