<?php

namespace App\Models;

use Czim\Repository\Criteria\Common\Has;

class MaritalStatus extends HasUsers
{
    protected $fillable = ['status'];
}
