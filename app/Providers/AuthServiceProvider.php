<?php

namespace App\Providers;

use App\Post;
use App\User;
use App\Category;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\CategoryPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
	Post::class => PostPolicy::class,
	User::class => UserPolicy::class,
    	Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
