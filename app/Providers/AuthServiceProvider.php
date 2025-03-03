<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Constants\DefaultRoles;
use App\Models\Calculation;
use App\Models\Component;
use App\Models\Customer;
use App\Models\Inquiry;
use App\Models\Role;
use App\Models\Subsection;
use App\Models\User;
use App\Policies\CalculationPolicy;
use App\Policies\ComponentPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\InquiryPolicy;
use App\Policies\RolePolicy;
use App\Policies\SubsectionPolicy;
use App\Policies\UserPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Customer::class => CustomerPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Inquiry::class => InquiryPolicy::class,
        Subsection::class => SubsectionPolicy::class,
        Component::class => ComponentPolicy::class,
        Calculation::class => CalculationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole(DefaultRoles::SUPER_USER['key']) ? true : null;
        });
    }
}
