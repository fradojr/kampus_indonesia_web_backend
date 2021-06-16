<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function news()
    {
        return $this->belongsToMany(news::class, 'author_news');
    }
}
