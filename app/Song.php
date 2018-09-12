<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'artist', 'rating', 'album_id'];

    public function Album()
    {
        return $this->belongsTo(Album::class);
    }
}
