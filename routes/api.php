<?php
use Illuminate\Http\Request;
use App\Data\Repositories\Articles as ArticlesRepository;

Route::group(['prefix' => '/posts/{edition_id}'], function () {
    Route::get('/featured', function (Request $request, $edition_id) {
        return app(ArticlesRepository::class)->featured($edition_id);
    });

    Route::get('/nonFeatured', function (Request $request, $edition_id) {
        return app(ArticlesRepository::class)->nonFeatured($edition_id);
    });

    Route::get('/all', function (Request $request, $edition_id) {
        return app(ArticlesRepository::class)->all($edition_id);
    });

    Route::get('/{slug}', function (Request $request, $edition_id, $slug) {
        return Response::json(app(ArticlesRepository::class)->findBySlug($edition_id, $slug));
    });
});
