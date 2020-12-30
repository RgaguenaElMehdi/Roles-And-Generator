<?php
namespace Sysfast;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Sysfast\Middleware\RoleMiddleware;

class MiddlewareServiceProvider extends ServiceProvider{

    // public function register() {
    //     app('router')->aliasMiddleware('Role', \Sysfast\Middleware\MiddlewareServiceProvider::class);

    // }

    public function boot() {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('Role', RoleMiddleware::class);
        // $router->middleware('Roles', \Sysfast\Middleware\MiddlewareServiceProvider::class);
    }

}
