<?php

namespace App\Providers;

use App\Repositories\PelotaRepository;
use App\Repositories\PelotaRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Registrar el bindeo de PelotaRepository como implementación para PelotaRepository
//        $this->app->bind(PelotaRepositoryInterface::class, function ($app){
//            return new PelotaRepository();
//        });

        //Alternativa bindear directamente con el nombre
        $this->app->bind(PelotaRepositoryInterface::class, PelotaRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
