<?php
namespace HipchatNotification;
use Illuminate\Support\ServiceProvider;

class HipchatLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        if (method_exists($this,'config_path')) {
            // published config file
            $this->publishes([
             __DIR__ . '/../config/hipchat.php' => config_path('hipchat.php')
            ], 'hipchat');
        } else {
            echo 'config_path method does not exist! Try to copy src/config/hipchat.php to /config/hichat.php';

        }
    }
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('hipchat-laravel', function () {
            return new HipChat();
        });
    }
}