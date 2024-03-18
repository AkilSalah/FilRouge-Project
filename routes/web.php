<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/', function () {
    return view('Admin.dashboard');
});


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/Admin/Dashboard', [AdminController::class,'index'])->name('Admin.dashboard');
Route::get('Guide/Dashboard',[GuideController::class,'index'])->name('Guide.dashboard');
Route::get('Client/Home',[ClientController::class,'index'])->name('Client');