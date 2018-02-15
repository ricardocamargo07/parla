<?php

namespace App\Http\Controllers;

use App\Data\Models\Post;

class Posts extends Controller
{
    public function show($year, $month, $day, $slug)
    {
        return view('home.post')
                ->with('post', Post::findBySlug($slug));
    }
}
