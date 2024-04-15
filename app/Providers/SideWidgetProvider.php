<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Categories;
use App\Models\Portofolio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.widget-front', function ($view) {
            $categories = Categories::whereHas('articles', function (Builder $query) {
                $query->where('status', 1);
            })->withCount(['articles' => function ($query) {
                $query->where('status', 1);
            }])->latest()->get();

            $view->with('categories_posts', $categories);
        });

        View::composer('components.widget-front', function ($view) {
            $article = Article::orderBy('views', 'DESC')->take(3)->get();

            $view->with('popular_article', $article);
        });

        View::composer('components.widget-article-front', function ($view) {
            $categories = Categories::whereHas('articles', function (Builder $query) {
                $query->where('status', 1);
            })->withCount(['articles' => function ($query) {
                $query->where('status', 1);
            }])->latest()->get();

            $view->with('categories_posts', $categories);
        });

        View::composer('components.widget-article-front', function ($view) {
            $article = Article::orderBy('views', 'DESC')->take(3)->get();

            $view->with('popular_article', $article);
        });

        // Portofolios
        View::composer('components.widget-show-portofolio-front', function ($view) {
            $categories = Categories::whereHas('portofolios', function (Builder $query) {
                $query->where('status', 1);
            })->withCount(['portofolios' => function ($query) {
                $query->where('status', 1);
            }])->latest()->get();

            $view->with('categories_posts', $categories);
        });

        View::composer('components.widget-show-portofolio-front', function ($view) {
            $portofolio = Portofolio::orderBy('views', 'DESC')->take(3)->get();

            $view->with('popular_portofolio', $portofolio);
        });
    }
}
