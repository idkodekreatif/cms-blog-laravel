<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class FrontCategoriesController extends Controller
{
    public function index($slugCategories)
    {
        return view('front.category.index', [
            'articles' => Article::with('categories')
                ->whereHas('categories', function ($q) use ($slugCategories) {
                    $q->where('slug', $slugCategories);
                })
                ->latest()
                ->paginate(9),
            'portofolios' => Portofolio::with('categories')
                ->whereHas('categories', function ($q) use ($slugCategories) {
                    $q->where('slug', $slugCategories);
                })
                ->latest()
                ->paginate(9),
            'categories' => $slugCategories
        ]);
    }
}
