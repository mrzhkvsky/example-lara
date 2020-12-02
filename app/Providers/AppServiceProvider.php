<?php

namespace App\Providers;

use App\Cache\BitStatsRepositoryCache;
use App\Repositories\EloquentBidRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\Interfaces\BidRepository;
use App\Repositories\Interfaces\BidStatsRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepository::class => EloquentUserRepository::class,
        BidRepository::class => EloquentBidRepository::class,
        BidStatsRepository::class => BitStatsRepositoryCache::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
