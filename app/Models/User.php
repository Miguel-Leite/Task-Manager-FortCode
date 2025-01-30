<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasRoles, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function getRoleAttribute()
  {
    $allPermissions = Permission::all();

    $userRoles = $this->roles()->with('permissions')->get();

    $userPermissions = $userRoles->flatMap(function ($role) {
      return $role->permissions;
    })->pluck('id')->unique();

    $permissionsGrouped = $allPermissions->map(function ($permission) use ($userPermissions) {
      return [
        'id' => $permission->id,
        'name' => $permission->name,
        'hasPermission' => $userPermissions->contains($permission->id),
      ];
    });

    $rolesWithPermissions = $userRoles->map(function ($role) use ($permissionsGrouped) {
      return [
        'id' => $role->id,
        'name' => $role->name,
        'permissions' => [
          'hasPermission' => $permissionsGrouped->pluck('hasPermission')->contains(true),
          'details' => $permissionsGrouped,
        ],
      ];
    });

    return $rolesWithPermissions->first();
  }

}
