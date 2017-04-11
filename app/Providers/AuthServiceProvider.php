<?php

namespace App\Providers;

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

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_management_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_management_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_management_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_management_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Categories
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Lessons
        Gate::define('lesson_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('lesson_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('lesson_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('lesson_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('lesson_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Slides
        Gate::define('slide_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slide_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slide_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('slide_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('slide_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Answers
        Gate::define('answer_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('answer_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('answer_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('answer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('answer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Reactiontoanswer
        Gate::define('reactiontoanswer_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('reactiontoanswer_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('reactiontoanswer_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('reactiontoanswer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('reactiontoanswer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
