<?php

namespace App\Providers;

use App\Plugin;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class HashIdModelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Plugin::created(function (Plugin $plugin) {
            $generator = new Hashids(Plugin::class, 10);
            $plugin->url_string = $generator->encode($plugin->id);
            $plugin->save();
        });
    }
}
