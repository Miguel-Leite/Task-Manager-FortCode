<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'description',
    'status',
    'assigned_user_id',
    'user_id',
    'deadline',
  ];

  protected $hidden = ['assigned_user_id', 'user_id'];

  /**
   * Define a relationship to the User model (assignee).
   */
  public function assignedUser()
  {
    return $this->belongsTo(User::class, 'assigned_user_id');
  }

  /**
   * Scope to filter tasks by status.
   *
   * @param \Illuminate\Database\Eloquent\Builder $query
   * @param string $status
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeByStatus($query, $status)
  {
    return $query->where('status', $status);
  }
}
