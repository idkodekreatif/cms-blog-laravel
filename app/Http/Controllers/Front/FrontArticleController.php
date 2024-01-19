<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;

class FrontArticleController extends Controller
{
    public function show($slug)
    {
        return view('front.article.show', [
            'article' => Article::whereSlug($slug)->first(),
            'categories_posts' => Categories::latest()->get()
        ]);
    }
}
