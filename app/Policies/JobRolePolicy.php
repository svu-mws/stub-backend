<?php

namespace App\Policies;

use App\Models\JobRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobRolePolicy
{
    use HandlesAuthorization;

    public function view(User $user, JobRole $model)
    {
        return $user->can('view job roles');
    }

    public function create(User $user)
    {
        return $user->can('create job roles');
    }

    public function update(User $user, JobRole $model)
    {
        return $user->can('update job roles');
    }

    public function delete(User $user, JobRole $model)
    {
        return $user->can('delete job roles');
    }
}
