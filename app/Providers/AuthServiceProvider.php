<?php

namespace App\Providers;

use App\User;
use App\Campus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('show-user',function(User $user,User $user_show){
            return $user->owns_this($user_show);
        });

        Gate::define('show-campus',function(User $user,Campus $campus){
            return $user->campus_id === $campus->id;
        });
        //
    }
}
