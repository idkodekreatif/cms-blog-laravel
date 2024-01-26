<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\ContactAs;
use Illuminate\Http\Request;

class FrontContactAsController extends Controller
{
    public function index()
    {
        $configKeys = ['address', 'blogname', 'email', 'phone'];

        return view('front.contactAs.index', [
            'configKeys' => $configKeys,

            'config' => Config::whereIn('name', $configKeys)->pluck('value', 'name'),
        ]);
    }

   public function store(Request $request)
{
    // dd($request->all());
     $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'description' => 'required|max:255',
    ]);

    ContactAs::create($data);

    toast('Successfully', 'success');
    return redirect()->back();
}

}
