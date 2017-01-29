<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Broadcast::routes();
        Broadcast::channek('App.User.*', function($user, $userId){
            return(int) $user->id ===(int) $userId;
        });

        //We will autenticaye the user'spersonnal channel
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
     }
}


