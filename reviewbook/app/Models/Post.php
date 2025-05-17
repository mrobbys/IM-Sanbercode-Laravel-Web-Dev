<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'image', 'genres_id'];

    public function genres()
    {
        return $this->belongsTo(Genre::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'posts_id');
    }
}
