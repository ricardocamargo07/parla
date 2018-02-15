<?php

use App\Data\Models\Post;
use Illuminate\Http\Request;

Route::get('/posts/featured', function (Request $request) {
    return Post::featured();
});

Route::get('/posts/nonFeatured', function (Request $request) {
    return Post::nonFeatured();
});
