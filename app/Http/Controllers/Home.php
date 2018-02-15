<?php

namespace App\Http\Controllers;

use App\Data\Models\Post;

class Home extends Controller
{
    public function index()
    {
        return view('home.index')
                ->with('featured', Post::featured())
                ->with('nonFeatured', Post::nonFeatured());
    }

    public function post()
    {
        return view('home.post');
    }
}
