<?php

use App\Data\Models\Article;
use App\Data\Repositories\Users;
use Ramsey\Uuid\Uuid;

Artisan::command('parla:refresh-slugs', function () {
    Article::all()->each(function ($article) {
        $article->slug = Uuid::uuid4();

        $article->save();

        $this->info($article->title);
    });

    $this->info('All done.');
})->describe('Display an inspiring quote');
