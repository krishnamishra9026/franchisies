<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collab;
use Faker\Generator;

class CollabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Collab::create([
                'title' => $faker->jobTitle,
                'creator' => $faker->name(),
                'impression' => $faker->text(10),
                'clicks' => $faker->randomNumber(1),
            ]);
        }
    }
}
