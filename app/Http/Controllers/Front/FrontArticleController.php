<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Portofolio;

class FrontArticleController extends Controller
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

        return view('front.article.index', [
            'articles' => $articles,
            'keywords' => $keywords
        ]);
    }

    public function show($slug)
    {
        $articles = Article::whereSlug($slug)->firstOrFail();
        $articles->increment('views');

        return view('front.article.show', [
            'article' => $articles,
        ]);
    }
}
