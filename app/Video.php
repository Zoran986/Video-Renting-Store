<?php

namespace App;

use App\Genre;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function genre() 
    {
        return $this->belongsTo(Genre::class);
    }

    public function user()
    {
        return $this->belongTo(Users::class);
    }
}
