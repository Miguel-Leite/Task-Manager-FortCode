<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

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
