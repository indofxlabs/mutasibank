<?php

namespace Indofx\Mutasibank;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Indofx\Mutasibank\Console\InstallMutasibank;
use Indofx\Mutasibank\Mutasibank;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mutasibank', function () {
            return new Mutasibank();
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/config.php' => config_path('mutasibank.php'),
            ], 'mutasibank-config');

            // $this->commands([
            //     InstallMutasibank::class,
            // ]);
        }
    }
}
