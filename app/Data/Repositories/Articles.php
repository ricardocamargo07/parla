<?php
namespace App\Data\Repositories;

use App\Data\Models\Article;
use App\Data\Models\Edition;
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
            ->where('edition_id', Edition::where('number', 1)->first()->id)
            ->whereNotNull('published_at');
    }

    /**
     * @param $article
     * @return Article[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    protected function makeReadAlso($article)
    {
        return $this->getBaseQuery()
            ->get()
            ->reject(function ($item) use ($article) {
                return $item->id === $article->id;
            });
    }

    public function nonFeatured()
    {
        return $this->all()->where('featured', false);
    }

    protected function fillArticleData($article)
    {
        $markdown = new Service();

        $article['featured'] = isset($article['featured'])
            ? $article['featured']
            : false;

        $article['link'] = route('posts.show', [
            'year' => $article->edition->year,
            'month' => $article->edition->month,
            'number' => $article->edition->number,
            'slug' => $slug = $article->slug
        ]);

        $article['authors_string'] = $this->makeAuthorsString(
            $article['authors']
        );

        $article['slug'] = $slug;

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

        $article['read_also'] = $this->makeReadAlso($article);

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

    public function findByEdition($year, $month, $number, $slug)
    {
        return coollect(
            $this->fillArticleData(
                Edition
                    ::where('year', $year)
                    ->where('month', $month)
                    ->where('number', $number)
                    ->with('articles')
                    ->first()
                    ->articles->where('slug', $slug)
                    ->first()
            )
        );
    }
}
