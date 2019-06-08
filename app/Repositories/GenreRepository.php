<?php

namespace App\Repositories;

use Czim\Repository\BaseRepository;
use App\Models\Genre;
use Czim\Repository\ExtendedRepository;

class GenreRepository extends ExtendedRepository
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return Genre::class;
    }
}
