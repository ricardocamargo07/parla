<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'edition_id',
        'title',
        'order',
        'published_at',
        'category',
        'subtitle',
        'lead',
        'body',
        'featured',
    ];
}
