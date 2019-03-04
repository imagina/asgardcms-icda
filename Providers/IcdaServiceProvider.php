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
            $event->load('inventories', array_dot(trans('icda::inventories')));
            $event->load('inventoryinspections', array_dot(trans('icda::inventoryinspections')));
            $event->load('inspectioninventories', array_dot(trans('icda::inspectioninventories')));
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
        //Pre Inspections
        $this->app->bind(
          'Modules\Icda\Repositories\PreInspectionsRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentPreInspectionsRepository(new \Modules\Icda\Entities\PreInspections());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CachePreInspectionsDecorator($repository);
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
        //Axes
        $this->app->bind(
          'Modules\Icda\Repositories\AxesRepository',
          function () {
            $repository = new \Modules\Icda\Repositories\Eloquent\EloquentAxesRepository(new \Modules\Icda\Entities\Axes());

            if (! config('app.cache')) {
              return $repository;
            }

            return new \Modules\Icda\Repositories\Cache\CacheAxesDecorator($repository);
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
// add bindings




    }
}
