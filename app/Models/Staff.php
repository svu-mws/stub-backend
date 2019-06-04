<?php

namespace App\Models;

class Staff extends Person
{
    public function jobRoles()
    {
        return $this->belongsToMany(JobRole::class, 'job_role_movie_staff');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'job_role_movie_staff');
    }
}
