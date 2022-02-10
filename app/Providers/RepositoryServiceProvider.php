<?php

namespace App\Providers;

use App\Contracts\departmentContract;
use App\Contracts\employeeContract;
use App\Contracts\systemContract;
use App\Repositories\departmentRepository;
use App\Repositories\employeeRepository;
use App\Repositories\systemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(departmentContract::class, departmentRepository::class);
        $this->app->bind(systemContract::class, systemRepository::class);
        $this->app->bind(employeeContract::class, employeeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
