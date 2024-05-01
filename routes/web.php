<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\resetPasswordController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\VoyageController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;



Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [ClientController::class, 'index'])->name('welcome');


Route::get('/reset_Password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('reset_password');
route::get('/forgetPassword',[ForgotPasswordController::class, 'forgetPassword'])->name('forgetPassword');
route::post('/forgetPassword',[ForgotPasswordController::class, 'forgetPasswordPost'])->name('forgetPasswordPost');
route::post('/reset_Password',[ForgotPasswordController::class, 'resetPasswordPost'])->name('resetPasswordPost');


    // Routes pour les administrateurs
    Route::middleware(['auth','role:Admin'])->group(function () {
        Route::get('/Admin/Dashboard', [AdminController::class,'index'])->name('Admin.dashboard');
        Route::get('/Admin/Categories', [CategoriesController::class, 'index'])->name('Admin.categorie');
        route::post('/Admin/Categories', [CategoriesController::class, 'store'])->name('insert.categories');
        route::put('/Admin/Categories/{categorie} ', [CategoriesController::class, 'update'])->name('update.categories');
        route::delete('/Admin/Categories/{categorie}', [CategoriesController::class, 'destroy'])->name('delete.categories');
        Route::get('/Admin/Produit', [ProductsController::class, 'index'])->name('Admin.produit');
        route::post('/Admin/Produit', [ProductsController::class, 'store'])->name('insert.produit');
        Route::put('/Admin/Produit/{product}', [ProductsController::class, 'update'])->name('update.produit');
        Route::delete('/Admin/Produit/{product}', [ProductsController::class, 'destroy'])->name('delete.produit');
        Route::get('/Admin/Theme', [ThemeController::class, 'index'])->name('Admin.theme');
        route::post('/Admin/Theme', [ThemeController::class,'store'])->name('insert.theme');
        Route::put('Admin/Theme/{theme}', [ThemeController::class, 'update'])->name('theme.update');
        Route::delete('Admin/Theme/{theme}', [ThemeController::class, 'destroy'])->name('theme.delete');
        Route::get('/Admin/tripApproved', [AdminController::class, 'tripApproved'])->name('tripApproved');
        Route::patch('/Admin/Published/{trip}' ,[AdminController::class ,'tripPublished'])->name('publier');
        Route::delete('/Admin/TripDelete/{theme}',[AdminController::class ,'tripDelete'])->name('trip.delete');
        Route::patch('/Admin/blockAccess/{userId}',[AdminController::class ,'blockAccess'])->name('blockAccess');

    });

    
    // Routes pour les guides
    Route::middleware(['auth','role:Guide'])->group(function () {
        Route::get('Guide/Dashboard',[GuideController::class,'index'])->name('Guide.dashboard');
        Route::get('/Guide/Voyages' ,[VoyageController::class , 'index'])->name('Guide.voyages');
        Route::post('/Guide/Voyages',[VoyageController::class, 'store'])->name('insert.voyages');
        Route::put('/Guide/Voyages/{voyage}',[VoyageController::class, 'update'])->name('update.voyages');
        Route::delete('/Guide/Voyages/{voyage}',[VoyageController::class, 'destroy'])->name('destroy.voyages');
        Route::get('/Guide/Reservation' ,[GuideController::class , 'acceptation'])->name('Guide.reservation');
        Route::patch('/Guide/accepter-reservation/{tripReservation}', [GuideController::class, 'acceptReservation'])->name('guide.accepterReservation');
        Route::delete('/Guide/delete-reservation/{tripReservation}', [GuideController::class, 'deleteReservation'])->name('guide.delete');
    });

    
    
    Route::get('/search',[ClientController::class,'search'])->name('Client.fetch');

    // Routes pour les clients
    Route::middleware(['auth','role:Client'])->group(function () {
        Route::get('/client/panier', [PanierController::class, 'index'])->name('client.panier');
        Route::get('/client/Trips', [ClientController::class, 'tripIndex'])->name('client.trip');
        Route::get('/client/reservation/{trip}', [ReservationController::class, 'index'])->name('client.trip.show');
        Route::post('/client/reservation', [ReservationController::class,'store'])->name('client.store');
        Route::post('Client/AddToCart/{productId}',[ClientController::class,'store'])->name('add_to_cart');
        Route::get('Client/Home',[ClientController::class,'index'])->name('Client');
        Route::get('Client/ProductDetails/{ProductId}',[ClientController::class,'create'])->name('ProductDetails');
        Route::get('/filter', [ArticleController::class, 'filter'])->name('Client.filter');
        Route::delete('Client/Panier/{idProduct}' ,[PanierController::class , 'deleteFromPanier'])->name('deleteFromPanier');
        Route::post('/Client/AddArticle' ,[ArticleController::class,'store'])->name('storeArticle');
        Route::put('/Client/UpdateArticle/{article}' ,[ArticleController::class,'update'])->name('updateArticle');
        Route::delete('/Client/deleteArticle/{article}' ,[ArticleController::class,'destroy'])->name('deleteArticle');
        Route::get('/Client/ArticleDetail/{articleId}', [CommentaireController::class, 'index'])->name('articleDetail');
        Route::post('/Client/AddComment/{Article}', [CommentaireController::class,'store'])->name('commentStore');
        Route::put('/Client/UpdateComment/{commentaire}' ,[CommentaireController::class,'update'])->name('commentUpdate');
        Route::delete('/Client/deleteComment/{commentaire}' ,[CommentaireController::class,'destroy'])->name('commentDelete');
        Route::get('/Client/Article/theme={themeId}', [ArticleController::class, 'index'])->name('articles');

        Route::get('/client/GetTicket', [ticketController::class, 'index'])->name('Client.getTicket');
        Route::get('/client/pdf/{id}', [ticketController::class, 'pdf'])->name('pdf');

        Route::post('/session', [StripeController::class,'session'])->name('session');
        Route::get('/success',  [StripeController::class,'success'] )->name('success');


        Route::get('/client/Favoris', [FavorisController::class, 'index'])->name('Client.favoris');
        Route::delete('/Client/DeleteFavoris/{favoris}', [FavorisController::class, 'destroy'])->name('destroy.favoris');
        Route::post('/Client/AddToFavoris/{clientId}/{productId}', [FavorisController::class, 'store'])->name('Add.favoris');
        Route::delete('/Client/DeleteFavoris/{clientId}/{productId}', [FavorisController::class,'destroy'])->name('Delete.favoris');
        
        Route::post('/Client/toggleFavorit/{clientId}/{productId}', [FavorisController::class,'toggleFavorit'])->name('toggleFavorit');
        


    });

    Route::get('/Contact-Us', function(){
            return view('Client.contact');
        })->name('contact');
