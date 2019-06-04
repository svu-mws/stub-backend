<?php


namespace App\Policies;


use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Movie $movie)
    {
        return $user->can('view movies');
    }

    public function create(User $user)
    {
        return $user->can('create movies');
    }

    public function update(User $user, Movie $movie)
    {
        return $user->can('update movies');
    }

    public function delete(User $user, Movie $movie)
    {
        return $user->can('delete movies');
    }
}
