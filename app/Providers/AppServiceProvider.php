<?php

namespace App\Providers;

use App\Aplications\DAO\PostDao;
use App\Infra\DAO\PostDaoDatabase;
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
        $this->app->bind(PostDao::class, PostDaoDatabase::class);
    }

    /**s
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
