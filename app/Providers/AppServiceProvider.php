<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Client;
// use Illuminate\Database\Eloquent\Model as MongoModel;
use Illuminate\Database\Eloquent\Model as MongoModel; // Assuming you are using MongoDB with Eloquent

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
        // MongoModel::unguard();
        // // MongoModel::unguard();

        // if (app()->environment('local')) {
        //     \DB::listen(function ($query) {
        //         \Log::info('MongoDB Query: ' . $query->sql);
        //     });
        // }
    }
}
