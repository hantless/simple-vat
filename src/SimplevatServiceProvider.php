<?php

namespace Hantless\SimpleVat;

use Illuminate\Support\ServiceProvider;

use Hantless\SimpleVat\Validation\Vatformat;


class SimplevatServiceProvider extends ServiceProvider
{
    /**
     * Booststrap the application services.
     *
     */
    public function boot()
    {
        $this->registerValidator();
    }

    /**
     * Register the application services.
     *
     */
    public function register()
    {
    }

    protected function registerValidator()
    {
        $this->app['validator']->extend('vat_format', Vatformat::class . '@validate');
    }

}