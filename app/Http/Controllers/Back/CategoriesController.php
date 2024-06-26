<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.categiries.index', [
            'categories' => Categories::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                'name' => 'required|min:5',
            ]);

            $data['slug'] = Str::slug($data['name']);

            Categories::create($data);

            toast('Successfully created category', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Error', 'An error occurred. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|min:5',
            ]);

            $data['slug'] = Str::slug($data['name']);

            Categories::find($id)->update($data);

            toast('Successfully updated category', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Error', 'An error occurred. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::find($id)->delete();

        toast('Categories deleted successfully.', 'success');
        return redirect()->route('categories.index');
    }
}
