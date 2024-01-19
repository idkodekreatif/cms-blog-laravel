<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoriesController;
use App\Http\Controllers\Back\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('dashboard', DashboardController::class)->only([
    'index',
]);;

Route::resource('articles', ArticleController::class);

Route::resource('categories', CategoriesController::class)->only([
    'index', 'store', 'update', 'destroy',
]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
