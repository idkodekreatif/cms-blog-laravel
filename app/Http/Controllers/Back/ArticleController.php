<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('categories')->latest()->get();

            return DataTables::of($article)
                // customized column
                ->addColumn('title', function ($article) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $article->title . '</p>';
                })
                ->addColumn('categories_id', function ($article) {
                    return '<p class="text-xs text-secondary mb-0">' . $article->categories->name . '</p>';
                })
                ->addColumn('views', function ($article) {
                    return '<p class="text-xs text-secondary mb-0">' . $article->views . 'x</p>';
                })
                ->addColumn('status', function ($article) {
                    $badgeClass = $article->status == 0 ? 'bg-gradient-secondary' : 'bg-gradient-success';
                    $statusText = $article->status == 0 ? 'Private' : 'Published';
                    return '<span class="badge badge-sm ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->addColumn('published', function ($article) {
                    return '<p class="text-xs text-secondary mb-0">' . $article->published . 'x</p>';
                })
                ->addColumn('button', function ($article) {
                    return '<button type="button" class="font-weight-bold text-xs btn btn-secondary btn-sm"
                        data-bs-toggle="modal" data-bs-target="#categoriesUpdate' . $article->id . '">
                        Show
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="font-weight-bold text-xs btn btn-warning btn-sm"
                        data-bs-toggle="modal" data-bs-target="#categoriesUpdate' . $article->id . '">
                        Update
                    </button>
                     <button type="button" class="font-weight-bold text-xs btn btn-danger btn-sm"
                        data-bs-toggle="modal" data-bs-target="#categoriesUpdate' . $article->id . '">
                        Delete
                    </button>';
                })
                ->rawColumns(['title', 'views', 'categories_id', 'status', 'published', 'button'])
                ->make();
        }


        return view('back.article.index');
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
