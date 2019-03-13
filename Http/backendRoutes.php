<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icda'], function (Router $router) {
    //Vehicles
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
    $router->get('vehicles/{vehicles}/inspections', [
        'as' => 'admin.icda.vehicles.inspections',
        'uses' => 'VehiclesController@show',
        'middleware' => 'can:icda.vehicles.edit'
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
    //Inspections
    $router->bind('inspections', function ($id) {
        return app('Modules\Icda\Repositories\InspectionsRepository')->find($id);
    });
    $router->get('inspections', [
        'as' => 'admin.icda.inspections.index',
        'uses' => 'InspectionsController@index',
        'middleware' => 'can:icda.inspections.index'
    ]);
    $router->get('inspections/create', [
        'as' => 'admin.icda.inspections.create',
        'uses' => 'InspectionsController@create',
        'middleware' => 'can:icda.inspections.create'
    ]);
    $router->post('inspections', [
        'as' => 'admin.icda.inspections.store',
        'uses' => 'InspectionsController@store',
        'middleware' => 'can:icda.inspections.create'
    ]);
    $router->get('inspections/{inspections}/inspections', [
        'as' => 'admin.icda.inspections.inspections',
        'uses' => 'InspectionsController@show',
        'middleware' => 'can:icda.inspections.edit'
    ]);
    $router->get('inspections/{inspections}/edit', [
        'as' => 'admin.icda.inspections.edit',
        'uses' => 'InspectionsController@edit',
        'middleware' => 'can:icda.inspections.edit'
    ]);
    $router->put('inspections/{inspections}', [
        'as' => 'admin.icda.inspections.update',
        'uses' => 'InspectionsController@update',
        'middleware' => 'can:icda.inspections.edit'
    ]);
    $router->delete('inspections/{inspections}', [
        'as' => 'admin.icda.inspections.destroy',
        'uses' => 'InspectionsController@destroy',
        'middleware' => 'can:icda.inspections.destroy'
    ]);
// append


});
