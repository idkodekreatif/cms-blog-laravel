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
                    $limitedTitle = Str::limit($article->title, 25, '...');
                    return '<p class="text-xs font-weight-bold mb-0">' . $limitedTitle . '</p>';
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
                    $formatted_date = \Carbon\Carbon::parse($article->published)->format('M d, Y');
                    return '<p class="text-xs text-secondary mb-0">' . $formatted_date . '</p>';
                })

                ->addColumn('button', function ($article) {
                    return '
                        <div class="ms-auto">
                                <a href="' . route('articles.show', $article->id) . '" class="text-secondary font-weight-bold text-xs">
                                    show
                                </a>
                                <a href="' . route('articles.edit', $article->id) . '" class="text-warning font-weight-bold text-xs" style="margin-left: 5px;">
                                    edit
                                </a>
                                <a href="' . route('articles.destroy', $article->id) . '" class="text-danger font-weight-bold text-xs" style="margin-left: 5px;">
                                    delete
                                </a>
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
                $file->storeAs('public/back/img/articles', $fileName);

                $data['img'] = $fileName;
            }

            $data['user_id'] = Auth()->user()->id;
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
            'article' => Article::with('user', 'categories')->find($id)
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
                Storage::delete('public/back/img/articles/' . $article->img);

                $file = $request->file('img');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back/img/articles/', $fileName);

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
                Storage::delete('public/back/img/articles/' . $imageName);
            }

            // Delete the article
            $article->delete();

            toast('Portofolio deleted successfully.', 'success');
            return redirect()->route('articles.index');
        } catch (\Exception $e) {
            // Handle other exceptions, log them, or return an appropriate response
            alert()->error('Error', 'Error deleting portofolio.');
            return redirect()->route('articles.index');
        }
    }
}
