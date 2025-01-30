<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $user = auth()->guard()->user();
    $permissions = [
      'create_users' => $user->can('create users'),
      'edit_users' => $user->can('edit users'),
      'delete_users' => $user->can('delete users'),
    ];

    $users = User::all();
    return view('users', compact('permissions', 'users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:6',
    ]);

    try {
      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      return redirect()->route('users.index')->with('success', 'User created successfully.');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Failed to create user. Please try again.');
    }
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email,' . $id,
    ]);

    try {
      $user = User::findOrFail($id);
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);

      return redirect()->route('users.index')->with('success', 'User updated successfully.');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Failed to update user. Please try again.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $user = User::findOrFail($id);
      $user->delete();

      return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Failed to delete user. Please try again.');
    }
  }
}
