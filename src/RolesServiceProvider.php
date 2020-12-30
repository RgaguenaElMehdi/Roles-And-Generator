<?php
namespace Sysfast;

use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        // Get namespace
        $nameSpace = $this->app->getNamespace();

        // Routes
        $this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function()
        {
            require __DIR__.'/Http/routes.php';
        });

        // Views
        $this->publishes([
            __DIR__.'/views/layouts' => base_path('resources/views/layouts'),
            __DIR__.'/views/templates' => base_path('resources/views/templates'),
            __DIR__.'/seeders' => base_path('database/Models'),
            __DIR__.'/Models' => base_path('app/Models'),
            __DIR__.'/migrations' => base_path('database/migrations'),
            __DIR__.'/Roles' => base_path('app/Traits'),
        ]);
    }

    public function register() {}

}
