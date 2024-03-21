<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoyageController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/', [ClientController::class, 'index'])->name('welcome');


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
Route::get('/Guide/Voyages' ,[VoyageController::class , 'index'])->name('Guide.voyages');
Route::post('/Guide/Voyages',[VoyageController::class, 'store'])->name('insert.voyages');
Route::put('/Guide/Voyages/{voyage}',[VoyageController::class, 'update'])->name('update.voyages');
Route::delete('/Guide/Voyages/{voyage}',[VoyageController::class, 'destroy'])->name('destroy.voyages');

// --------------------------------------------------------------------------------------------------
Route::get('/client/panier', [PanierController::class, 'index'])->name('client.panier');
Route::get('/client/Trips', [ClientController::class, 'tripIndex'])->name('client.trip');
Route::get('/client/reservation/{trip}', [ReservationController::class, 'index'])->name('client.trip.show');
Route::post('/client/reservation', [ReservationController::class,'store'])->name('client.store');
Route::post('Client/AddToCart/{productId}',[ClientController::class,'store'])->name('add_to_cart');
Route::get('Client/Home',[ClientController::class,'index'])->name('Client');
Route::get('Client/fetch',[ProductsController::class,'filterSearch'])->name('Client.fetch');
Route::delete('Client/Panier/{idProduct}' ,[PanierController::class , 'deleteFromPanier'])->name('deleteFromPanier');
// ----------------------------------------------------------------------------------------------------------