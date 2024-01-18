<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Alert;

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
                    return '<p class="text-xs text-secondary mb-0">' . $article->published . '</p>';
                })
                ->addColumn('button', function ($article) {
                    return '
                        <div class="ms-auto">
                            <a href="' . route('articles.show', $article->id) . '" class="btn btn-outline-secondary text-xs btn-sm">
                                <i class="fas fa-eye me-1"></i>Show
                            </a>
                            <a href="' . route('articles.edit', $article->id) . '" class="btn btn-outline-warning text-xs btn-sm">
                                <i class="fas fa-pencil-alt me-1"></i>Update
                            </a>
                            <form action="' . route('articles.destroy', $article->id) . '" method="post" style="display:inline">
                                ' . csrf_field() . '
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="font-weight-bold text-xs btn btn-outline-danger btn-sm"
                                    onclick="return confirm(\'Are you sure you want to delete this article?\')"><i class="far fa-trash-alt me-1"></i>Delete</button>
                            </form>
                        </div>
                    ';
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
        try {
            $data = $request->validated();

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back/img', $fileName);

                $data['img'] = $fileName;
            }

            $data['slug'] = Str::slug($data['title']);
            Article::create($data);

            toast('Article insert successfully.', 'success');
            return redirect()->route('articles.index');
        } catch (\Exception $e) {
            alert()->error('Error', 'Error inserting article.');
            return redirect()->route('articles.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article'       => Article::find($id),
            'categories'    => Categories::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        try {
            $article = Article::findOrFail($id);

            $data = $request->validated();

            if ($request->hasFile('img')) {
                // Unlink the old image file
                Storage::delete('public/back/img/' . $article->img);

                $file = $request->file('img');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back/img', $fileName);

                $data['img'] = $fileName;
            }

            $data['slug'] = Str::slug($data['title']);
            $article->update($data);

            toast('Article updated successfully.', 'success');
            return redirect()->route('articles.index');
        } catch (\Exception $e) {
            alert()->error('Error', 'Error updating article.');
            return redirect()->route('articles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the article
            $article = Article::findOrFail($id);

            // Delete the associated image
            if ($article->img) {
                // Get the image file name
                $imageName = $article->img;

                // Delete the image file
                Storage::delete('public/back/img/' . $imageName);
            }

            // Delete the article
            $article->delete();

            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        } catch (\Exception $e) {
            // Handle other exceptions, log them, or return an appropriate response
            return redirect()->route('articles.index')->with('error', 'Error deleting article.');
        }
    }
}
