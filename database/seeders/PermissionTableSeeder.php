<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $permissions = [
               'Dashboard',
               'Brands',
               'Enquiries',
               'FAQs',
               'Blogs',
               'Categories',
               'Users',
               'Content Management',
               'Roles',
               'Settings',
               'Information Pages',
               'My Account',
               'Change Password',
               'Website Settings',
          ];

          foreach ($permissions as $permission) {
               Permission::create(['name' => $permission, 'guard_name' => 'administrator']);
          }
     }
}
