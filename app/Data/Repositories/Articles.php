<?php
namespace App\Data\Repositories;

use App\Data\Models\Article;
use App\Services\Markdown\Service;
use Jenssegers\Date\Date as Carbon;

class Articles
{
    public function all()
    {
        return $this->fillArticlesData($this->getBaseQuery()->get());
    }

    public function featured()
    {
        return $this->all()->where('featured', true);
    }

    protected function fillArticlesData($articles)
    {
        return $articles->map(function ($article) {
            return $this->fillArticleData($article);
        });
    }

    private function getBaseQuery()
    {
        return Article
            ::with(['edition', 'photos', 'authors'])
            ->whereNotNull('published_at');
    }

    public function nonFeatured()
    {
        return $this->all()->where('featured', false);
    }

    protected function fillArticleData($article)
    {
        $markdown = new Service();

        $slug = str_slug($article['title']);

        $date = Carbon::parse($article['created_at']);

        $article['featured'] = isset($article['featured'])
            ? $article['featured']
            : false;

        $article['link'] = route('posts.show', [
            'year' => $date->year,
            'month' => $date->month,
            'day' => $date->day,
            'slug' => $slug
        ]);

        $article['authors_string'] = $this->makeAuthorsString(
            $article['authors']
        );

        $article['slug'] = $slug;

        $article['created_at'] = $date;

        $article['date'] = Carbon::parse($article['created_at'])->format('F Y');

        $article['main_photo'] = $this->makePhotosCollection($article['photos'])
            ->where('main', true)
            ->first();

        $article['other_photos'] = $this->makePhotosCollection(
            $article['photos']
        )
            ->where('main', false)
            ->values();

        $article['lead_limited_featured'] = $markdown->convert(
            str_limit($article['lead'], 450)
        );

        $article['lead_limited'] = $markdown->convert(
            str_limit($article['lead'], 200)
        );

        $article['lead'] = $markdown->convert($article['lead']);

        $article['body'] = $markdown->convert($article['body']);

        return $article;
    }

    protected function makeAuthorsString($authors)
    {
        $authors = $authors->pluck('name')->toArray();

        return join(
            ' e ',
            array_filter(
                array_merge(
                    array(join(', ', array_slice($authors, 0, -1))),
                    array_slice($authors, -1)
                ),
                'strlen'
            )
        );
    }

    protected function makePhotosCollection($photos)
    {
        return coollect($photos)->map(function ($photo) {
            $author = $photo['author'];

            $notes = $photo['notes'];

            $photo['notes_and_author'] =
                $notes .
                (!empty($notes) && !empty($author) ? " (Foto: $author)" : '');

            $photo['author_credits'] = (
                !empty($author) ? "(Foto: $author)" : ''
            );

            return $photo;
        });
    }
}
