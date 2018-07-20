<?php
namespace App\Data\Repositories;

use App\Data\Models\Article;
use App\Data\Models\Edition;
use Jenssegers\Date\Date as Carbon;

class Articles
{
    public function all($edition_id, $excludeUnpublished = true)
    {
        return $this->fillArticlesData(
            $this->getBaseQuery($edition_id, $excludeUnpublished)->get()
        );
    }

    private function articleOrdersWereFixed($article)
    {
        $wasFixed = false;

        $nextCode = 0;

        $article->edition->articles
            ->sortBy('order')
            ->each(function ($article) use (
                &$lastOrder,
                &$wasFixed,
                &$nextCode
            ) {
                $nextCode++;

                if ($article->order !== $nextCode) {
                    $article->order = $nextCode;
                    $article->save();
                    $wasFixed = true;
                }
            });

        return $wasFixed;
    }

    public function featured($edition_id)
    {
        return $this->all($edition_id)->where('featured', true);
    }

    public function nonFeatured($edition_id)
    {
        return $this->all($edition_id)->where('featured', false);
    }

    protected function fillArticlesData($articles)
    {
        return $articles->map(function ($article) {
            return $this->fillArticleData($article);
        });
    }

    private function findArticleById($article_id)
    {
        return Article::find($article_id);
    }

    public function findEditionById($edition_id)
    {
        return Edition::find($edition_id);
    }

    public function findEditionByNumber($number)
    {
        return Edition
            ::where(
                'number',
                $number === 'last' ? $this->getLastEdition()->number : $number
            )
            ->take(1)
            ->get()
            ->first();
    }

    private function moveArticle($article_id, $direction)
    {
        $article1 = $this->findArticleById($article_id);

        if ($this->articleOrdersWereFixed($article1)) {
            return;
        }

        $order1 = $article1->order;

        $lastOrder = Article
            ::where('edition_id', $article1->edition_id)
            ->orderBy('order', 'desc')
            ->first();

        if (
            ($article1->order == 1 && $direction == -1) ||
            ($article1->order == $lastOrder->order && $direction == 1)
        ) {
            return;
        }

        $article2 = $this->getBaseQuery($article1->edition->id, false)
            ->where('edition_id', $article1->edition_id)
            ->where('order', $order1 + $direction)
            ->first();

        $article1->order = $article2->order;
        $article1->save();

        $article2->order = $order1;
        $article2->save();
    }

    private function normalizeArticleColumns($article)
    {
        $article->featured = $article->featured ?: false;

        return $article;
    }

    protected function getBaseQuery($edition_id, $excludeUnpublished = true)
    {
        $query = Article
            ::with(['edition', 'photos', 'authors'])
            ->where('edition_id', $edition_id)
            ->orderBy('order');

        if ($excludeUnpublished) {
            $query->whereNotNull('published_at');
        }

        return $query;
    }

    protected function getLastEdition()
    {
        return Edition
            ::orderBy('number', 'desc')
            ->whereNotNull('published_at')
            ->take(1)
            ->get()
            ->first();
    }

    /**
     * @param $article
     * @return Article[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    protected function makeReadAlso($article)
    {
        return $this->getBaseQuery($article->edition_id)
            ->get()
            ->reject(function ($item) use ($article) {
                return $item->id === $article->id;
            });
    }

    protected function fillArticleData($article)
    {
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

    public function findBySlug($slug)
    {
        return Article
            ::all()
            ->where('slug', $slug)
            ->first();
    }

    public function edittions()
    {
        return Edition::all();
    }

    public function publish($article_id, $publish = true)
    {
        $article = $this->findArticleById($article_id);

        $article->published_at = $publish ? now() : null;

        $article->save();
    }

    public function publishEdition($edition_id, $publish = true)
    {
        $edition = $this->findEditionById($edition_id);

        $edition->published_at = $publish ? now() : null;

        // $this->publishEdition($article->edition);

        $edition->save();

        return $this->edittions();
    }

    public function createOrUpdate($newArticle)
    {
        $article = isset($newArticle['new'])
            ? new Article()
            : $this->findArticleById($newArticle['id']);

        $this->normalizeArticleColumns($article->fill($newArticle));

        $article->save();

        $article->updateAuthors($newArticle);

        $this->articleOrdersWereFixed($article);
    }

    public function moveUp($article_id)
    {
        $this->moveArticle($article_id, -1);
    }

    public function moveDown($article_id)
    {
        $this->moveArticle($article_id, 1);
    }

    public function createNewEdition($data)
    {
        Edition::create($data);

        return $this->edittions();
    }
}
