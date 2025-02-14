<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Frontend;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::with('plates.media')->get();
        $frontends = Frontend::all()->keyBy('key');
        return view('welcome', compact('categories', 'frontends'));
    }

}
