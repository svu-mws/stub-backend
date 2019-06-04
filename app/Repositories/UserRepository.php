<?php

namespace App\Repositories;

use Czim\Repository\BaseRepository;
use App\Models\User;
use Czim\Repository\ExtendedRepository;

class UserRepository extends ExtendedRepository
{
    public function model()
    {
        return User::class;
    }
}
