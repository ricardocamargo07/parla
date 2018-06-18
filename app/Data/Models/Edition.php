<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Edition extends Model
{
    protected $fillable = ['year', 'month', 'number', 'published_at'];

    protected $appends = ['month_name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getMonthNameAttribute()
    {
        return Date
            ::parse(sprintf('%s-%s-%s', $this->year, $this->month, 1))
            ->format('F');
    }
}
