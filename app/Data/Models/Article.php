<?php
namespace App\Data\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;

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

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function photos()
    {
        return $this->hasMany(ArticlePhoto::class);
    }

    public function authors()
    {
        return $this->hasMany(ArticleAuthor::class);
    }
}
