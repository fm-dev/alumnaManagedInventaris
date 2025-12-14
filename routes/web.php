<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckSession;

Route::get('/',[AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/registrations',[AuthController::class, 'showRegistrationForm'])->name('registrationsFrom');
Route::post('/registrations/add',[AuthController::class, 'registration'])->name('registrations');
Route::middleware(CheckSession::class)->group(function () {
   Route::get('/dashboard',[DashboardController::class, 'showDashboard'])->name('dashboard');
   Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});