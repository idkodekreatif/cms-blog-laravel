<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoriesController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ContactAsController;
use App\Http\Controllers\Back\PortofolioController;
use App\Http\Controllers\Front\FrontArticleController;
use App\Http\Controllers\Front\FrontCategoriesController;
use App\Http\Controllers\Front\FrontContactAsController;
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
// Search for articles widget
Route::post('/article', [FrontArticleController::class, 'index'])->name('article');

Route::get('/c/{slug}', [FrontCategoriesController::class, 'index'])->name('front.categories');
Route::get('/contact-as', [FrontContactAsController::class, 'index'])->name('contact_as');
Route::post('/contact-as', [FrontContactAsController::class, 'store'])->name('contact_as.store');


Auth::routes([
    'register' => false
]);

Route::middleware(['web', 'auth'])->prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only([
        'index',
    ]);

    Route::resource('portofolio', PortofolioController::class);

    Route::resource('articles', ArticleController::class);
    Route::get('/articles/delete/{id}', [ArticleController::class, 'destroy'])
        ->name('articles.destroy');

    Route::resource('config', ConfigController::class)->only([
        'index', 'update'
    ]);

    Route::resource('categories', CategoriesController::class)->only([
        'index', 'store', 'update', 'destroy',
    ]);
    Route::get('/categories/delete/{id}', [CategoriesController::class, 'destroy'])
        ->name('categories.destroy');

    Route::group(['prefix' => 'laravel-filemanager',], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::resource('contact-as', ContactAsController::class)->only([
        'index', 'show',
    ]);

    Route::get('/contact-as/delete/{id}', [ContactAsController::class, 'destroy'])
        ->name('contact-as.destroy');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
