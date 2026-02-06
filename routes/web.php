<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\restauController;

// Route::get('/', function () {
//     return view('home');
// });

 
// Route::get('/restaurant',[restauController::class,'showAllRestaurant'])->name('home');

Route::get('/dashboardR', [restauController::class, 'showDashboard'])->name('dashboardR');
Route::get('/AjouterR', [restauController::class, 'ShowFormResaurateur']);
Route::post('/AjouterR', [restauController::class, 'store'])->name('AjouterR');
Route::get('/edit', [restauController::class, 'ShowFormEdit'])->name('edit');
 Route::get('/restaurateur/{id}/edit', [restauController::class, 'edit'])->name('edit');
 Route::put('/restaurateur/{id}', [restauController::class, 'update'])->name('edit');

// Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/home', [restauController::class, 'search'])
// ->name('home');
Route::redirect('/', '/restaurant');
Route::get('/restaurant', [restauController::class, 'index'])->name('home');


Route::middleware('auth')->group(function(){
    Route::post('/home/{restaurant}/favorite', [restauController::class, 'favoriteRestau'])->name('restaurant.favorite');
    Route::delete('/home/{restaurant}/favorite', [restauController::class, 'unfavoriteRestau'])->name('restaurant.unfavorite');
});

Route::get('/viewFavorites', [restauController::class, 'listFavorites'])
->middleware('auth')
->name('viewFavorites');




