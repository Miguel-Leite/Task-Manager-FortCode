<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\EnsureAuth;
use App\Http\Middleware\EnsureUnAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->middleware(EnsureUnAuth::class)->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('overview')->middleware([EnsureAuth::class,])->group(function () {
  Route::get('/', [TaskController::class, 'create'])->name('tasks.index');
});

Route::prefix('tasks')->group(function () {
  Route::get('/', [TaskController::class, 'index']);
  Route::post('/', [TaskController::class, 'store']);
  Route::put('/{id}', [TaskController::class, 'update']);
  Route::delete('/{id}', [TaskController::class, 'destroy']);
  Route::put('/{id}/status', [TaskController::class, 'updateStatus']);
});

