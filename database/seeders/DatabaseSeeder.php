<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  
        $faker = app(Generator::class);
        
        $this->call(PermissionTableSeeder::class);
        
        \App\Models\User::factory()->create([
            'first_name' => 'Prashant',
            'last_name' => 'Chauhan',
            'username' => $faker->userName(),
            'name' => 'Prashant Chauhan',
            'email' => 'sponser@example.com'
        ]);

        for ($i = 1; $i < 19; $i++) {

            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            \App\Models\User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'username' => $faker->userName(),
                'name' => $firstName.' '.$lastName,
                'email' => $i == 1 ? 'sponsor@admin.com' : $faker->unique()->safeEmail(),
                'phone_number' => $faker->numerify('9#########')
            ]);
        }


        $role = Role::create(['name' => 'admin', 'guard_name' => 'administrator']);
        $role->givePermissionTo(Permission::all()); 

        $user = \App\Models\Administrator::factory()->create([
            'firstname' => 'Nurul', 
            'lastname' => 'Hasan',
            'email' => 'admin@admin.com'
        ]);

        $user->assignRole('admin');

        \App\Models\Administrator::factory(5)->create();

        \App\Models\Franchisor::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'creator@admin.com'
        ]);

        \App\Models\Franchisor::factory(20)->create();

        
        $this->call(CategorySeeder::class);
        $this->call(HomePageSettingSeeder::class);
        $this->call(HomePageReviewSeeder::class);
        $this->call(HomePageServiceSeeder::class);
        $this->call(InformationPageManagementSeeder::class);
        $this->call(WebsiteSettingSeeder::class);

        
    }
}
