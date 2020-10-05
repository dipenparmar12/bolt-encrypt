<?php

namespace Dipenparmar12\BoltEncrypt;

use Illuminate\Support\ServiceProvider;

class BoltEncryptServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'dipenparmar12');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'dipenparmar12');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bolt-encrypt.php', 'bolt-encrypt');

        // Register the service the package provides.
        $this->app->singleton('bolt-encrypt', function ($app) {
            return new BoltEncrypt;
        });

        //// Register CLI commands.
        $this->commands([
            BoltEncryptCommand::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bolt-encrypt'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/bolt-encrypt.php' => config_path('bolt-encrypt.php'),
        ], 'bolt-encrypt.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/dipenparmar12'),
        ], 'bolt-encrypt.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/dipenparmar12'),
        ], 'bolt-encrypt.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/dipenparmar12'),
        ], 'bolt-encrypt.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
