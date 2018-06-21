<?php
use Illuminate\Http\Request;
use App\Data\Repositories\Articles as ArticlesRepository;

Route::get('/editions', function () {
    return app(ArticlesRepository::class)->edittions();
});

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
});

Route::get('/posts/{slug}', function (Request $request, $slug) {
    return Response::json(app(ArticlesRepository::class)->findBySlug($slug));
});

Route::post('/markdown/to/html', function (Request $request) {
    return [
        'lead' => $markdown = $request->get('lead'),
        'body' => $markdown = $request->get('body'),
        'lead_html' =>
            app(App\Services\Markdown\Service::class)->convert(
                $request->get('lead')
            ),
        'body_html' =>
            app(App\Services\Markdown\Service::class)->convert(
                $request->get('body')
            ),
    ];
});
