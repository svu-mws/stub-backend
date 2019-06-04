<?php

namespace App\Repositories;

use App\Models\JobRole;
use Czim\Repository\ExtendedRepository;

class JobRoleRepository extends ExtendedRepository
{
    public function model()
    {
        return JobRole::class;
    }
}
