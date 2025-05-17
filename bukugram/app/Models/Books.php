<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = ['genre_id','title','author','image','description','published_date'];

    public function genre()
    {
        return $this->belongsTo(Genres::class);
    }

    public function comments(){
        return $this->hasMany(Comments::class, 'book_id');
    }
}
