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
               'Sponsors',
               'Creators',
               'Collabs',
               'Campaign',
               'Categories',
               'Content Type',
               'Tags',
               'Users',
               'Package',
               'Roles',
               'Settings',
               'Information Page Management',
               'My Account',
               'Change Password',
               'Website Settings',
          ];

          foreach ($permissions as $permission) {
               Permission::create(['name' => $permission, 'guard_name' => 'administrator']);
          }
     }
}
