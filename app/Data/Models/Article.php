<?php
namespace App\Data\Models;

use Ramsey\Uuid\Uuid;
use Spatie\Tags\HasTags;
use Jenssegers\Date\Date as Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Services\Markdown\Service as Markdown;

class Article extends Model
{
    use HasTags;

    protected $fillable = [
        'edition_id',
        'title',
        'order',
        'published_at',
        'category',
        'subtitle',
        'lead',
        'body',
        'featured'
    ];

    protected $appends = [
        'link',
        'authors_string',
        'authors_inline',
        'date',
        'main_photo',
        'other_photos',
        'lead_limited_featured_html',
        'lead_limited_html',
        'lead_html',
        'body_html'
    ];

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * @return Markdown
     */
    protected function getMarkdown(): Markdown
    {
        return new Markdown();
    }

    public function photos()
    {
        return $this->hasMany(ArticlePhoto::class);
    }

    public function authors()
    {
        return $this->hasMany(ArticleAuthor::class);
    }

    public function save(array $options = [])
    {
        if (empty($this->slug)) {
            $this->slug = Uuid::uuid4();
        }

        parent::save($options);
    }

    public function getLinkAttribute()
    {
        return route('posts.show', [
            'year' => $this->edition->year,
            'month' => $this->edition->month,
            'number' => $this->edition->number,
            'slug' => $slug = $this->slug
        ]);
    }

    public function getAuthorsStringAttribute()
    {
        return $this->makeAuthorsString($this->authors);
    }

    public function getMainPhotoAttribute()
    {
        return $this->makePhotosCollection($this->photos)
            ->where('main', true)
            ->first();
    }

    public function getOtherPhotosAttribute()
    {
        return $this->makePhotosCollection($this->photos)
            ->where('main', false)
            ->values();
    }

    public function getLeadLimitedFeaturedHtmlAttribute()
    {
        return $this->getMarkdown()->convert(str_limit($this->lead, 450));
    }

    public function getLeadLimitedHtmlAttribute()
    {
        return $this->getMarkdown()->convert(str_limit($this->lead, 200));
    }

    public function getBodyHtmlAttribute()
    {
        return $this->getMarkdown()->convert($this->body);
    }

    public function getLeadHtmlAttribute()
    {
        return $this->getMarkdown()->convert($this->lead);
    }

    public function getAuthorsInlineAttribute()
    {
        return $this->authors->pluck('name')->implode(',');
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

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('F Y');
    }

    public function updateAuthors($newArticle)
    {
        $names = coollect(explode(',', $newArticle['authors_inline']));

        $this->authors->each(function ($author) use ($names) {
            if (!$names->contains($author->name)) {
                $author->delete();
            }
        });

        $names->each(function ($name) {
            if ($this->authors->where('name', $name)->count() === 0) {
                ArticleAuthor::create([
                    'article_id' => $this->id,
                    'name' => $name
                ]);
            }
        });
    }
}
