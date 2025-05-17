<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name', 'description'];

    public function book()
    {
        return $this->hasMany(Books::class, 'genre_id');
    }
}
