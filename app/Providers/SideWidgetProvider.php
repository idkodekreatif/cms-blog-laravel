<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
            $categories = Categories::latest()->get();

            $view->with('categories_posts', $categories);
        });
    }
}
