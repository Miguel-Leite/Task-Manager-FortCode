<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Role extends SpatiePermission
{
  use HasFactory;

  public $incrementing = false;
  protected $hidden = ['guard_name', 'created_at', 'updated_at', 'pivot'];
}
