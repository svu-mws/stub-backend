<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    protected $fillable = ['title'];

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'job_role_movie_staff');
    }
}
