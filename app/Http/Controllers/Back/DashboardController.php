<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categories;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.index', [
            'total_article_count' => Article::count(),
            'total_categories_count' => Categories::count(),
            'latest_article' => Article::with('categories')->whereStatus(1)->latest()->take(5)->get(),
            'popular_article' => Article::with('categories')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get(),

            'total_portofolios_count' => Portofolio::count(),
            'latest_portofolios' => Portofolio::with('categories')->whereStatus(1)->latest()->take(5)->get(),
            'popular_portofolios' => Portofolio::with('categories')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
