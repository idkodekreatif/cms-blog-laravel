<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $portofolio = Portofolio::with('categories')->latest()->get();

            return DataTables::of($portofolio)
                // customized column
                ->addIndexColumn()
                ->addColumn('title', function ($portofolio) {
                    $limitedTitle = Str::limit($portofolio->title, 25, '...');
                    return '<p class="text-xs font-weight-bold mb-0">' . $limitedTitle . '</p>';
                })
                ->addColumn('categories_id', function ($portofolio) {
                    return '<p class="text-xs text-secondary mb-0">' . $portofolio->categories->name . '</p>';
                })
                ->addColumn('views', function ($portofolio) {
                    return '<p class="text-xs text-secondary mb-0">' . $portofolio->views . 'x</p>';
                })
                ->addColumn('status', function ($portofolio) {
                    $badgeClass = $portofolio->status == 0 ? 'bg-gradient-secondary' : 'bg-gradient-success';
                    $statusText = $portofolio->status == 0 ? 'Private' : 'Published';
                    return '<span class="badge badge-sm ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->addColumn('published', function ($portofolio) {
                    $formatted_date = \Carbon\Carbon::parse($portofolio->published)->format('M d, Y');
                    return '<p class="text-xs text-secondary mb-0">' . $formatted_date . '</p>';
                })

                ->addColumn('button', function ($portofolio) {
                    return '
                        <div class="ms-auto">
                                <a href="' . route('articles.show', $portofolio->id) . '" class="text-secondary font-weight-bold text-xs">
                                    show
                                </a>
                                <a href="' . route('articles.edit', $portofolio->id) . '" class="text-warning font-weight-bold text-xs" style="margin-left: 5px;">
                                    edit
                                </a>
                                <a href="' . route('articles.destroy', $portofolio->id) . '" class="text-danger font-weight-bold text-xs" style="margin-left: 5px;">
                                    delete
                                </a>
                        </div>
                    ';
                })
                ->rawColumns(['title', 'views', 'categories_id', 'status', 'published', 'button'])
                ->make();
        }

        return view('back.portofolio.index');
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
