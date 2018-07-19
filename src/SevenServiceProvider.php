<?php
namespace Sevenshi\Serverchan;

/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/7/17
 * Time: 17:30
 */
use Illuminate\Support\ServiceProvider;

class SevenServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/serverchan.php' => config_path('serverchan.php'),
        ], 'serverchan');
    }

    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/serverchan.php', 'serverchan');

        $this->app->singleton('serverchan', function ($app) {

            $config = $app->make('config');

            $SCKEY = $config->get('serverchan.SCKEY');

            return new SevenService($SCKEY);
        });
    }

    public function provides() {
        return ['serverchan'];
    }

}