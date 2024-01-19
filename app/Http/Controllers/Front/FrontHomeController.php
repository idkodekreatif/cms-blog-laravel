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
        return view('front.home.index', [
            'latest_posts' => Article::latest()->first(),
            'old_posts' => Article::latest()->get(),
            'categories_posts' => Categories::latest()->get()
        ]);
    }
}
