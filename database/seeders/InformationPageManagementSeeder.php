<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformationPageManagement;
use Illuminate\Support\Str;
use Faker\Generator;

class InformationPageManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);


        InformationPageManagement::create([
            'name' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'editor' => 'Privacy Policy',
            'meta_title' => 'Privacy Policy',
            'meta_description' => 'Privacy Policy',
        ]);

        InformationPageManagement::create([
            'name' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'editor' => 'Terms of Service',
            'meta_title' => 'Terms of Service',
            'meta_description' => 'Terms of Service',
        ]);

    }
}
