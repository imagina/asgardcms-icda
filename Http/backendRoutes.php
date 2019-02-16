<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icda'], function (Router $router) {
    $router->bind('vehicles', function ($id) {
        return app('Modules\Icda\Repositories\VehiclesRepository')->find($id);
    });
    $router->get('vehicles', [
        'as' => 'admin.icda.vehicles.index',
        'uses' => 'VehiclesController@index',
        'middleware' => 'can:icda.vehicles.index'
    ]);
    $router->get('vehicles/create', [
        'as' => 'admin.icda.vehicles.create',
        'uses' => 'VehiclesController@create',
        'middleware' => 'can:icda.vehicles.create'
    ]);
    $router->post('vehicles', [
        'as' => 'admin.icda.vehicles.store',
        'uses' => 'VehiclesController@store',
        'middleware' => 'can:icda.vehicles.create'
    ]);
    $router->get('vehicles/{vehicles}/edit', [
        'as' => 'admin.icda.vehicles.edit',
        'uses' => 'VehiclesController@edit',
        'middleware' => 'can:icda.vehicles.edit'
    ]);
    $router->put('vehicles/{vehicles}', [
        'as' => 'admin.icda.vehicles.update',
        'uses' => 'VehiclesController@update',
        'middleware' => 'can:icda.vehicles.edit'
    ]);
    $router->delete('vehicles/{vehicles}', [
        'as' => 'admin.icda.vehicles.destroy',
        'uses' => 'VehiclesController@destroy',
        'middleware' => 'can:icda.vehicles.destroy'
    ]);
// append

});
