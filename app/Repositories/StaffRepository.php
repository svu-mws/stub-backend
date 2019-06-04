<?php

namespace App\Repositories;

use App\Models\Staff;
use Czim\Repository\ExtendedRepository;

class StaffRepository extends ExtendedRepository
{
    public function model(): string
    {
        return Staff::class;
    }
}
