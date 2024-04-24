<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortofolioRequest;
use App\Http\Requests\PortofolioUpdateRequest;
use App\Models\Categories;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
                                <a href="' . route('portofolio.show', $portofolio->id) . '" class="text-secondary font-weight-bold text-xs">
                                    show
                                </a>
                                <a href="' . route('portofolio.edit', $portofolio->id) . '" class="text-warning font-weight-bold text-xs" style="margin-left: 5px;">
                                    edit
                                </a>
                                <a href="' . route('portofolio.destroy', $portofolio->id) . '" class="text-danger font-weight-bold text-xs" style="margin-left: 5px;">
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
        return view('back.portofolio.create', [
            'categories' => Categories::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortofolioRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back/img/portofolio', $fileName);

                $data['img'] = $fileName;
            }

            $data['user_id'] = Auth()->user()->id;
            $data['slug'] = Str::slug($data['title']);
            Portofolio::create($data);

            toast('Portofolio insert successfully.', 'success');
            return redirect()->route('portofolio.index');
        } catch (\Exception $e) {
            alert()->error('Error', 'Error inserting portofolio.');
            return redirect()->route('portofolio.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.portofolio.show', [
            'portofolio' => Portofolio::with('user', 'categories')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.portofolio.update', [
            'portofolio'    => Portofolio::find($id),
            'categories'    => Categories::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortofolioUpdateRequest $request, string $id)
    {
        try {
            $portofolio = Portofolio::findOrFail($id);

            $data = $request->validated();

            if ($request->hasFile('img')) {
                // Unlink the old image file
                Storage::delete('public/back/img/portofolio/' . $portofolio->img);

                $file = $request->file('img');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/back/img/portofolio/', $fileName);

                $data['img'] = $fileName;
            }

            $data['slug'] = Str::slug($data['title']);
            $portofolio->update($data);

            toast('Portofolio updated successfully.', 'success');
            return redirect()->route('portofolio.index');
        } catch (\Exception $e) {
            alert()->error('Error', 'Error updating portofolio.');
            return redirect()->route('portofolio.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the article
            $portofolio = Portofolio::findOrFail($id);

            // Delete the associated image
            if ($portofolio->img) {
                // Get the image file name
                $imageName = $portofolio->img;

                // Delete the image file
                Storage::delete('public/back/img/portofolio' . $imageName);
            }

            // Delete the portofolio
            $portofolio->delete();

            toast('Portofolio deleted successfully.', 'success');
            return redirect()->route('portofolio.index');
        } catch (\Exception $e) {
            // Handle other exceptions, log them, or return an appropriate response
            alert()->error('Error', 'Error deleting portofolio.');
            return redirect()->route('portofolio.index');
        }
    }
}
