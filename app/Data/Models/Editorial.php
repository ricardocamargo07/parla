<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    public $table = 'editorial';

    protected $fillable = ['text'];
}
