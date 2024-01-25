<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    //     $this->registerPolicies();

    //     Gate::define('perform-all-actions', function ($user) {
    //         return $user->hasPermission(['View tasks', 'Add tasks', 'Edit tasks', 'Delete tasks']);
    //     });

    //     Gate::define('view-tasks', function ($user) {
    //         return $user->hasPermission('View tasks');
    //     });

    //     Gate::define('add-tasks', function ($user) {
    //         return $user->hasPermission('Add tasks');
    //     });

    //     Gate::define('edit-tasks', function ($user) {
    //         return $user->hasPermission('Edit tasks');
    //     });

    //     Gate::define('delete-tasks', function ($user) {
    //         return $user->hasPermission('Delete tasks');
    //     });
    // }
    }

}
