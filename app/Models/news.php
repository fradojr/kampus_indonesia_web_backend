<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsToMany(authors::class, 'author_news');
    }
}
