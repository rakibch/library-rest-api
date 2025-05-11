<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
