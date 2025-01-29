<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view("login");
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
      return redirect()->back()->with('error', 'E-mail or password incorrect.');
    }

    $user = auth()->guard()->user();

    return redirect()->intended(route('tasks.index'))->with('success', 'Welcome back ' . ($user ? $user->name : ''));
  }

  public function logout(Request $request)
  {
    auth()->guard()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.index')->with('success', 'You have been logged out.');
  }
}
