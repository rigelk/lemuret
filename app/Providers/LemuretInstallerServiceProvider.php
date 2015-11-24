<?php

namespace App\Providers;

use RachidLaasri\LaravelInstaller\Providers\LaravelInstallerServiceProvider;

class LemuretInstallerServiceProvider extends LaravelInstallerServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app('router')->middleware('canInstall', '\RachidLaasri\LaravelInstaller\Middleware\canInstall');
        app('router')->middleware('canUpgrade', '\RachidLaasri\LaravelInstaller\Middleware\canUpgrade');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	include __DIR__ . '/../../vendor/rachidlaasri/laravel-installer/src/routes.php'; // I would like to know how to write more elegantly that line by refering not to __DIR__ but the RachidLaasri\LaravelInstaller directory…
        include __DIR__ . '/../Http/routes_installer.php';
    }
}
