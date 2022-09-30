<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MealController::class, 'index'])
    ->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('meals', MealController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

Route::resource('meals', MealController::class)
    ->only(['show', 'index']);

// いいねボタンのルーティング
Route::resource('meals.likes', LikeController::class)
    ->only(['store', 'destroy'])
    ->middleware('auth');




// Route::get('/like/{meal}', 'LikeController@nice')->name('like');
// Route::get('/unlike/{meal}', 'LikeController@unnice')->name('unlike');

require __DIR__ . '/auth.php';
