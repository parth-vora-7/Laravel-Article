<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Cviebrock\EloquentSluggable\SluggableTrait;

class RouteServiceProvider extends ServiceProvider
{
    use SluggableTrait;
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
        
/********** Route model binding ************/
        $router->model('articles', 'App\Article');
        $router->bind('articles', function($slugOrId) {
            //return \App\Article::withTrashed()->findOrFail($id);
            return \App\Article::withTrashed()->where('slug', '=', $slugOrId)->orWhere('id', '=', $slugOrId)->firstOrFail();
            //return \App\Article::findBySlugOrIdOrFail($slug);
        });
// If need to apply some specific conditions
//      $router->bind('articles', function($id) {
//        return \App\Article::published()->findOrFail($id);
//      });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
