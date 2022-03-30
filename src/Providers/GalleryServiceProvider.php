<?php

namespace Azuriom\Plugin\Gallery\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;

class GalleryServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected array $middleware = [
        // \Azuriom\Plugin\Gallery\Middleware\ExampleMiddleware::class,
    ];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected array $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * @var array
     */
    protected array $routeMiddleware = [
        // 'example' => \Azuriom\Plugin\Gallery\Middleware\ExampleRouteMiddleware::class,
    ];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected array $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMiddlewares();

        //
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();

        //
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            'gallery.home' => trans('gallery::messages.title')
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'gallery' => [
                'icon' => 'bi bi-images',
                'type' => 'dropdown',
                'name' => trans('gallery::messages.title'), // Traduction du nom de l'onglet
                'route' => 'gallery.admin.*', // Route de la page
                'items' => [
                    'gallery.admin.image' => trans('gallery::messages.admin.image'),
                    'gallery.admin.category.index' => trans('gallery::messages.admin.category'),
                ]
            ]
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            'gallery' => [
                'name' => trans('gallery::messages.title'), // Traduction du nom de l'onglet
                'route' => 'gallery.home', // Route de la page
            ]
        ];
    }
}
