<?php

namespace BoldLeads\Providers;

use BoldLeads\Repositories\Listing\EloquentListing;
use BoldLeads\Repositories\Listing\ListingRepository;
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
        $this->app->singleton(ListingRepository::class, EloquentListing::class);
    }
}
