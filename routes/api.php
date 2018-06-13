<?php
use Illuminate\Http\Request;
use App\Data\Repositories\Articles as ArticlesRepository;

Route::get('/posts/featured', function (Request $request) {
    return app(ArticlesRepository::class)->featured();
});

Route::get('/posts/nonFeatured', function (Request $request) {
    return app(ArticlesRepository::class)->nonFeatured();
});

Route::get('/posts/all', function (Request $request) {
    return app(ArticlesRepository::class)->all();
});

Route::get('/posts/{slug}', function (Request $request, $slug) {
    return Response::json(app(ArticlesRepository::class)->findBySlug($slug));
});
