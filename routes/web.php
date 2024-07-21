<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

// Route::resource('jobs', JobController::class);

Route::get('jobs', [JobController::class, 'index']);
Route::get('jobs/create', [JobController::class, 'create']);
Route::post('jobs', [JobController::class, 'store'])
    ->middleware('auth');
Route::get('jobs/{job}', [JobController::class, 'show']);
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job'); // method name from JobPolicy
Route::put('jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::delete('jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::view('/contact', 'contact');
