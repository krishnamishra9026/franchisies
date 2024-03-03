<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;
use Faker\Generator;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Campaign::create([
                'title' => $faker->text(8),
                'description' => $faker->paragraph,
            ]);
        }
    }
}
