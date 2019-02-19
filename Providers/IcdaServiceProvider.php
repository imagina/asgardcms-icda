<?php

namespace Modules\Icda\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icda\Events\Handlers\RegisterIcdaSidebar;

class IcdaServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcdaSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('vehicles', array_dot(trans('icda::vehicles')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('icda', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icda\Repositories\VehiclesRepository',
            function () {
                $repository = new \Modules\Icda\Repositories\Eloquent\EloquentVehiclesRepository(new \Modules\Icda\Entities\Vehicles());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icda\Repositories\Cache\CacheVehiclesDecorator($repository);
            }
        );
        //Types Vehicles
        $this->app->bind(
          'Modules\Icda\Repositories\TypesVehiclesRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentTypesVehiclesRepository(new \Modules\Icda\Entities\TypesVehicles());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CacheTypesVehiclesDecorator($repository);
          }
        );
        //Types Fuels
        $this->app->bind(
          'Modules\Icda\Repositories\TypesFuelsRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentTypesFuelsRepository(new \Modules\Icda\Entities\TypesFuel());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CacheTypesFuelsDecorator($repository);
          }
        );
        //Inspections Types
        $this->app->bind(
          'Modules\Icda\Repositories\InspectionsTypesRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentInspectionsTypesRepository(new \Modules\Icda\Entities\InspectionsTypes());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CacheInspectionsTypesDecorator($repository);
          }
        );
// add bindings

    }
}
