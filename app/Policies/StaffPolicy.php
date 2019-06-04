<?php


namespace App\Policies;


use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Staff $staff)
    {
        return $user->can('view staff');
    }

    public function create(User $user)
    {
        return $user->can('create staff');
    }

    public function update(User $user, Staff $staff)
    {
        return $user->can('update staff');
    }

    public function delete(User $user, Staff $staff)
    {
        return $user->can('delete staff');
    }
}
