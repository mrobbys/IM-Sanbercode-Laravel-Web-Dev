<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name', 'description'];

    public function posts(){
        return $this->hasMany(Post::class, 'genres_id');
    }
}
