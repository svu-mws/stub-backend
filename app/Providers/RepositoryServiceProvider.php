<?php

namespace App\Providers;

use App\Http\Controllers\Genre;
use App\Http\Controllers\JobRoleController;
use App\Http\Controllers\Movie;
use App\Http\Controllers\Staff;
use App\Http\Controllers\UserController;
use App\Repositories\GenreRepository;
use App\Repositories\JobRoleRepository;
use App\Repositories\MovieRepository;
use App\Repositories\StaffRepository;
use App\Repositories\UserRepository;
use Czim\Repository\ExtendedRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this
            ->app
            ->when(
                [
                    Staff\StaffController::class,
                    Staff\JobRoleController::class,
                    Staff\MovieController::class
                ]
            )
            ->needs(ExtendedRepository::class)
            ->give(StaffRepository::class);

        $this->app
            ->when([
                    Movie\MovieController::class,
                    Movie\StaffController::class,
                    Movie\GenreController::class
                ]
            )
            ->needs(ExtendedRepository::class)
            ->give(MovieRepository::class);

        $this->app
            ->when([
                    Genre\GenreController::class,
                    Genre\MovieController::class
                ]
            )
            ->needs(ExtendedRepository::class)
            ->give(GenreRepository::class);

        $this->app
            ->when(JobRoleController::class)
            ->needs(ExtendedRepository::class)
            ->give(JobRoleRepository::class);

        $this->app
            ->when(UserController::class)
            ->needs(ExtendedRepository::class)
            ->give(UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
