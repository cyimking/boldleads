<?php

namespace BoldLeads\Providers;

use BoldLeads\Repositories\Lead\EloquentLead;
use BoldLeads\Repositories\Lead\LeadRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LeadRepository::class, EloquentLead::class);
    }
}
