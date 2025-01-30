<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Role::create(['name' => 'super-admin'])->givePermissionTo(['create tasks', 'edit tasks', 'delete tasks', 'view tasks', 'create users', 'edit users', 'delete users', 'view users']);
    Role::create(['name' => 'employee'])->givePermissionTo(['view tasks', 'edit tasks']);
  }
}
