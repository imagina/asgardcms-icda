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
            $event->load('inspections', array_dot(trans('icda::inspections')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('icda', 'permissions');
        $this->publishConfig('icda', 'config');

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
        //Inspections
        $this->app->bind(
          'Modules\Icda\Repositories\InspectionsRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentInspectionsRepository(new \Modules\Icda\Entities\Inspections());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CacheInspectionsDecorator($repository);
          }
        );
        $this->app->bind(
            'Modules\Icda\Repositories\InventoryRepository',
            function () {
                $repository = new \Modules\Icda\Repositories\Eloquent\EloquentInventoryRepository(new \Modules\Icda\Entities\Inventory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icda\Repositories\Cache\CacheInventoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Icda\Repositories\InspectionInventoryRepository',
            function () {
                $repository = new \Modules\Icda\Repositories\Eloquent\EloquentInspectionInventoryRepository(new \Modules\Icda\Entities\InspectionInventory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icda\Repositories\Cache\CacheInspectionInventoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Icda\Repositories\InspectionHistoryRepository',
            function () {
                $repository = new \Modules\Icda\Repositories\Eloquent\EloquentInspectionHistoryRepository(new \Modules\Icda\Entities\InspectionHistory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icda\Repositories\Cache\CacheInspectionHistoryDecorator($repository);
            }
        );
// add bindings




    }
}
