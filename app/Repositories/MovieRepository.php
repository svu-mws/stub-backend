<?php

namespace App\Repositories;

use Czim\Repository\BaseRepository;
use App\Models\Movie;
use Czim\Repository\ExtendedRepository;

class MovieRepository extends ExtendedRepository
{
    public function model()
    {
        return Movie::class;
    }
}
