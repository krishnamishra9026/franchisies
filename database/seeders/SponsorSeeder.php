<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use Faker\Generator;


class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Sponsor::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $i == 1 ? 'sponsor@admin.com' : $faker->unique()->safeEmail(),
                'phone_number' => $faker->numerify('9#########')
            ]);
        }
    }
}
