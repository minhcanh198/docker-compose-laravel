<?php

namespace App\Providers;

use App\Models\Lead;
use App\Models\Program;
use App\Models\Provider;
use App\Models\User;
use App\Policies\LeadPolicy;
use App\Policies\ProgramPolicy;
use App\Policies\ProviderPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Provider::class => ProviderPolicy::class,
        Lead::class => LeadPolicy::class,
        Program::class => ProgramPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
