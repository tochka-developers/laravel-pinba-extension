<?php

namespace tochkaDevelopers\Pinba;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/pinba.php';
        $this->mergeConfigFrom($configPath, 'pinba');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/pinba.php';
        $this->publishes([$configPath => config_path('pinba.php')], 'config');

        /** @var \Illuminate\Config\Repository $config */
        $config = $this->app['config'];

        // If enabled is null, set from the app.debug value
        $enabled = $config->get('pinba.enabled');
        if (is_null($enabled)) {
            $enabled = $config->get('app.debug');
        }

        $extension_loaded = false;
        if (extension_loaded('pinba')) {
            $extension_loaded = true;

            if ($enabled) {

                if (ini_get('pinba.enabled') !== '1') {
                    ini_set('pinba.enabled', true);
                }
                if (ini_get('pinba.server') === '') {
                    ini_set('pinba.server', $config->get('pinba.server'));
                }

                /** @var \Illuminate\Routing\Router $router */
                $router = $this->app['router'];
                $router->middleware('pinba', Middleware::class);

                /** @var \Illuminate\Foundation\Http\Kernel $kernel */
                $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
                $kernel->pushMiddleware(Middleware::class);
            } else {
                ini_set('pinba.enabled', false);
            }
        }

        $enabled = $enabled && $extension_loaded;
        $this->app->singleton('pinba', function ($app) use ($enabled) {
            return new LaravelPinba($app, $enabled);
        });
        $this->app->alias('pinba', 'tochkaDevelopers\Pinba\LaravelPinba');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pinba'];
    }
}
