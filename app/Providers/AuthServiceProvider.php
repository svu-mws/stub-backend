<?php

namespace App\Providers;

use App\Models\JobRole;
use App\Models\Movie;
use App\Models\Staff;
use App\Models\User;
use App\Policies\JobRolePolicy;
use App\Policies\MoviePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
