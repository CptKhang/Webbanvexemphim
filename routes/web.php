<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ScreeningsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MoviesController::class,'indexuser'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['admin'])->group(function () {
    
    route::prefix('/admin/movies')->group (function()
    {
    Route::get('/',[MoviesController::class,'index']);
    Route::get('/create',[MoviesController::class,'create']);
    Route::post('/',[MoviesController::class,'store']);
    Route::get('/screenings',[ScreeningsController::class,'index']);
    });
});

// Route::get('/admin/movies{ma}',[MoviesController::class,'show']);
// Route::get('/admin/movies/edit/{id}',[MoviesController::class,'edit']);
// Route::put('/admin/movies/update',[MoviesController::class,'update']);
// Route::delete('/admin/movies/delete/{id}',[MoviesController::class,'destroy']);

Route::get('/user/movies',[MoviesController::class,'indexuser']);
Route::get('/user/movies{ma}',[MoviesController::class,'show']);

Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');





Route::get('/user/movies/bookings/{ma}',[ScreeningsController::class,'showBookingForm']);
Route::get('/user/bookings/{ma}',[BookingsController::class,'index2']);



Route::post('/user/bookings/cart', [CartController::class, 'add']);
Route::get('/orders', [CartController::class, 'viewOrders'])->name('orders');
// Route::get('/cart',[BookingsController::class,'index']);
