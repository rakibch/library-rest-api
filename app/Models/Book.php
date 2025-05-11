<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function bookshelf()
    {
        return $this->belongsTo(Bookshelf::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

}
