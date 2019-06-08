<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['type'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
