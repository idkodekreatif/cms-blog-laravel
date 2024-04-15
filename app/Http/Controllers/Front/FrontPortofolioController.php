<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class FrontPortofolioController extends Controller
{
    public function index()
    {
        $keywords = request()->keywords;

        if ($keywords) {
            $portofolios = Portofolio::with('categories')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keywords . '%')
                ->latest()
                ->simplePaginate(6);
        } else {
            $portofolios = Portofolio::with('categories')
                ->whereStatus(1)
                ->latest()
                ->simplePaginate(6);
        }

        // Ambil kategori-kategori yang memiliki portofolio terkait
        $categories = Categories::has('portofolios')->get();

        return view('front.portofolio.index', [
            'categories' => $categories,
            'portofolios' => $portofolios,
            'keywords' => $keywords
        ]);
    }


    public function show($slug)
    {
        $portofolio = Portofolio::whereSlug($slug)->firstOrFail();
        $portofolio->increment('views');

        return view('front.portofolio.show', [
            'portofolio' => $portofolio,
        ]);
    }

    public function getByCategory(Request $request)
    {
        if ($request->ajax()) {
            $category_id = $request->category_id;
            $portofolios = Portofolio::with('categories', 'user')
                ->where('categories_id', $category_id)
                ->whereStatus(1)
                ->latest()
                ->get(); // Anda bisa menyesuaikan logika ini sesuai kebutuhan

            return response()->json([
                'portofolios' => $portofolios
            ]);
        }
    }

    public function getAll(Request $request)
    {
        if ($request->ajax()) {
            $portofolios =
                Portofolio::with('categories', 'user')
                ->whereStatus(1)
                ->latest()
                ->get();

            return response()->json([
                'portofolios' => $portofolios
            ]);
        }
    }
}
