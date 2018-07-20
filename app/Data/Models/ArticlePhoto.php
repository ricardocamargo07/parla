<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlePhoto extends Model
{
    protected $table = 'article_photos';

    protected $fillable = [
        'article_id',
        'author',
        'url_highres',
        'url_lowres',
        'notes',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
