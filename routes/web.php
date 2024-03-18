<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------------------------------------------------------------------
Route::get('/Admin/Dashboard', [AdminController::class,'index'])->name('Admin.dashboard');

Route::get('/Admin/Categories', [CategoriesController::class, 'index'])->name('Admin.categorie');
route::post('/Admin/Categories', [CategoriesController::class, 'store'])->name('insert.categories');
route::put('/Admin/Categories/{categorie} ', [CategoriesController::class, 'update'])->name('update.categories');
route::delete('/Admin/Categories/{categorie}', [CategoriesController::class, 'destroy'])->name('delete.categories');

Route::get('/Admin/Produit', [ProductsController::class, 'index'])->name('Admin.produit');
route::post('/Admin/Produit', [ProductsController::class, 'store'])->name('insert.produit');
Route::put('/Admin/Produit/{product}', [ProductsController::class, 'update'])->name('update.produit');
Route::delete('/Admin/Produit/{product}', [ProductsController::class, 'destroy'])->name('delete.produit');
// --------------------------------------------------------------------------------------------




Route::get('Guide/Dashboard',[GuideController::class,'index'])->name('Guide.dashboard');

Route::get('Client/Home',[ClientController::class,'index'])->name('Client');