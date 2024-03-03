<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;
use Faker\Generator;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for ($i = 1; $i < 20; $i++) {
            Package::create([
                'name' => $faker->text(8),
                'description' => $faker->text(),
                'monthly_price' => $faker->randomDigit,
                'quarterly_price' => $faker->randomDigit,
                'half_yearly_price' => $faker->randomDigit,
                'yearly_price' => $faker->randomDigit,
            ]);
        }
    }
}
