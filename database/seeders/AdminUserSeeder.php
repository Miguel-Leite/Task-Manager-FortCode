<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $admin = User::create([
      'name' => 'Super Admin',
      'email' => 'admin@taskmanager.com',
      'password' => bcrypt('password'),
    ]);

    $role = Role::create(['name' => 'super-admin']);
    $role->givePermissionTo(['create tasks', 'edit tasks', 'delete tasks', 'view tasks', 'create users', 'edit users', 'delete users', 'view users']);

    $admin->assignRole($role);
  }
}
