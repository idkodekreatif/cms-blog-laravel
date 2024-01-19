<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $keywords = request()->keywords;

        if ($keywords) {
            $articles = Article::with('categories')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keywords . '%')
                ->latest()
                ->simplePaginate(6);
        } else {
            $articles = Article::with('categories')->whereStatus(1)->latest()->simplePaginate(6);
        }

        return view('front.home.index', [
            'latest_posts' => Article::with('categories')->latest()->first(),
            'old_posts' => $articles,
            'categories_posts' => Categories::latest()->get()
        ]);
    }
}
