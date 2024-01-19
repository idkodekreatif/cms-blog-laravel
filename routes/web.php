<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoriesController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\FrontArticleController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontHomeController::class, 'index']);
Route::post('/article/search', [FrontHomeController::class, 'index'])->name('article_search');
Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/article', [FrontArticleController::class, 'index'])->name('article');
Route::post('/article', [FrontArticleController::class, 'index'])->name('article');

Auth::routes([
    'register' => false
]);

Route::middleware(['web', 'auth'])->group(function () {
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
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
