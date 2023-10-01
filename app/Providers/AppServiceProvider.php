<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Interfaces\CrudRepositoryInterface;
use App\Interfaces\CrudInterface;
use App\Models\Client;
use App\Models\Company;
use App\Repositories\CrudRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrudRepositoryInterface::class, CrudRepository::class);
        $this->app->bind(CrudInterface::class, Company::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if(\Schema::hasTable('companies')) {
            $companiesCount = Company::count();
            View::share(['companiesCount' => $companiesCount]);
        }

        if(\Schema::hasTable('clients')) {
            $clientsCount = Client::count();
            \View::share(['clientsCount' => $clientsCount]);
        }
    }
}
