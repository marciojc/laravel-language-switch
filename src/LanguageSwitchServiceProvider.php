<?php

namespace marcio\LanguageSwitch;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageServiceProvider;
use Cviebrock\EloquentSluggable\ServiceProvider as EloquentSluggable;
use Dimsav\Translatable\TranslatableServiceProvider;
use browner12\helpers\HelperServiceProvider;
use Collective\Html\HtmlServiceProvider;
use Illuminate\Pagination\Paginator;
use Route;
use GEN\Admin\Facades\Admin as AdminFacade;

class LanguageSwitchServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(HelperServiceProvider::class);

        $this->loadHelpers();
    }

    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router, Dispatcher $event)
    {

    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
