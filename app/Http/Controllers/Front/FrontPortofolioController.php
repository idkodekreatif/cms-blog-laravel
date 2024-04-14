<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
            $portofolios = Portofolio::with('categories')->whereStatus(1)->latest()->simplePaginate(6);
        }

        return view('front.portofolio.index', [
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
}
