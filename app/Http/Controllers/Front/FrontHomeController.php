<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categories;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    // public function index()
    // {
    //     $keywords = request()->keywords;

    //     if ($keywords) {
    //         $articles = Article::with('categories')
    //             ->whereStatus(1)
    //             ->where('title', 'like', '%' . $keywords . '%')
    //             ->latest()
    //             ->simplePaginate(6);
    //     } else {
    //         $articles = Article::with('categories')->whereStatus(1)->latest()->simplePaginate(3);
    //     }

    //     return view('front.home.index', [
    //         'latest_portofolios' => Portofolio::with('categories', 'user')->latest()->take(4)->get(),
    //         'popular_posts' => Article::with('categories', 'user')->latest()->take(4)->get(),
    //         'old_posts' => $articles,
    //         'keywords' => $keywords
    //     ]);
    // }

    public function index()
    {
        $keywords = request()->keywords;

        // Mengambil artikel berdasarkan kata kunci jika ada
        $articlesQuery = Article::with('categories')->whereStatus(1)->latest();

        if ($keywords) {
            $articlesQuery->where('title', 'like', '%' . $keywords . '%');
        }

        // Mengambil artikel terbaru
        $articles = $articlesQuery->simplePaginate(3);

        // Mengambil portofolio berdasarkan kata kunci jika ada
        $portofoliosQuery = Portofolio::with('categories')->whereStatus(1)->latest();

        if ($keywords) {
            $portofoliosQuery->where('title', 'like', '%' . $keywords . '%');
        }

        // Mengambil portofolio terbaru
        $portofolios = $portofoliosQuery->simplePaginate(3);

        // Mengambil artikel populer berdasarkan jumlah views
        $popularPosts = Article::with('categories', 'user')
            ->whereStatus(1)
            ->orderByDesc('views')
            ->take(4)
            ->get();

        return view('front.home.index', [
            'latest_portofolios' => $portofolios,
            'popular_posts' => $popularPosts,
            'old_posts' => $articles,
            'keywords' => $keywords
        ]);
    }
}
