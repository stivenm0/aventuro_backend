<?php

namespace App\Providers;

use App\Policies\MoonshineUserPolicy;
use App\Policies\MoonshineUserRolePolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        
        Gate::policy(MoonshineUser::class, MoonshineUserPolicy::class);
        Gate::policy(MoonshineUserRole::class, MoonshineUserRolePolicy::class);
    }
}
