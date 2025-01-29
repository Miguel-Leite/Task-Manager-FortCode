<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Permission::create(['name' => 'create tasks']);
    Permission::create(['name' => 'edit tasks']);
    Permission::create(['name' => 'delete tasks']);
    Permission::create(['name' => 'view tasks']);

    Permission::create(['name' => 'create users']);
    Permission::create(['name' => 'edit users']);
    Permission::create(['name' => 'delete users']);
    Permission::create(['name' => 'view users']);
  }
}
