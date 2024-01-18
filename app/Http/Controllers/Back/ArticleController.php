<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

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
                ->addIndexColumn()
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
        return view('back.article.create', [
            'categories' => Categories::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back/img', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);
        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Article insert successfully.');
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
