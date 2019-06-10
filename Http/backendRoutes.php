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

    $router->group(['prefix' =>'bulkload'], function (Router $router){

        $router->get('index',[
            'as'=>'admin.icda.bulkload.index',
            'uses'=>'VehiclesController@indexImport',
            'middleware'=>'can:icda.bulkload.import',
        ]);

        $router->post('import',[
            'as'=>'admin.icda.bulkload.import',
            'uses'=>'VehiclesController@import',
             'middleware'=>'can:icda.bulkload.import',
        ]);
        //Brands
        $router->get('brands/index',[
            'as'=>'admin.icda.bulkload.brands.index',
            'uses'=>'BrandsController@indexImport',
            'middleware'=>'can:icda.bulkload.import',
        ]);

        $router->post('brands/import',[
            'as'=>'admin.icda.bulkload.brands.import',
            'uses'=>'BrandsController@import',
             'middleware'=>'can:icda.bulkload.import',
        ]);
        //Color
        $router->get('colors/index',[
            'as'=>'admin.icda.bulkload.colors.index',
            'uses'=>'ColorController@indexImport',
            'middleware'=>'can:icda.bulkload.import',
        ]);

        $router->post('colors/import',[
            'as'=>'admin.icda.bulkload.colors.import',
            'uses'=>'ColorController@import',
             'middleware'=>'can:icda.bulkload.import',
        ]);
    });

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
    $router->bind('brands', function ($id) {
        return app('Modules\Icda\Repositories\BrandsRepository')->find($id);
    });
    $router->get('brands', [
        'as' => 'admin.icda.brands.index',
        'uses' => 'BrandsController@index',
        'middleware' => 'can:icda.brands.index'
    ]);
    $router->get('brands/create', [
        'as' => 'admin.icda.brands.create',
        'uses' => 'BrandsController@create',
        'middleware' => 'can:icda.brands.create'
    ]);
    $router->post('brands', [
        'as' => 'admin.icda.brands.store',
        'uses' => 'BrandsController@store',
        'middleware' => 'can:icda.brands.create'
    ]);
    $router->get('brands/{brands}/edit', [
        'as' => 'admin.icda.brands.edit',
        'uses' => 'BrandsController@edit',
        'middleware' => 'can:icda.brands.edit'
    ]);
    $router->put('brands/{brands}', [
        'as' => 'admin.icda.brands.update',
        'uses' => 'BrandsController@update',
        'middleware' => 'can:icda.brands.edit'
    ]);
    $router->delete('brands/{brands}', [
        'as' => 'admin.icda.brands.destroy',
        'uses' => 'BrandsController@destroy',
        'middleware' => 'can:icda.brands.destroy'
    ]);
    $router->bind('line', function ($id) {
        return app('Modules\Icda\Repositories\LineRepository')->find($id);
    });
    $router->get('lines', [
        'as' => 'admin.icda.line.index',
        'uses' => 'LineController@index',
        'middleware' => 'can:icda.lines.index'
    ]);
    $router->get('lines/create', [
        'as' => 'admin.icda.line.create',
        'uses' => 'LineController@create',
        'middleware' => 'can:icda.lines.create'
    ]);
    $router->post('lines', [
        'as' => 'admin.icda.line.store',
        'uses' => 'LineController@store',
        'middleware' => 'can:icda.lines.create'
    ]);
    $router->get('lines/{line}/edit', [
        'as' => 'admin.icda.line.edit',
        'uses' => 'LineController@edit',
        'middleware' => 'can:icda.lines.edit'
    ]);
    $router->put('lines/{line}', [
        'as' => 'admin.icda.line.update',
        'uses' => 'LineController@update',
        'middleware' => 'can:icda.lines.edit'
    ]);
    $router->delete('lines/{line}', [
        'as' => 'admin.icda.line.destroy',
        'uses' => 'LineController@destroy',
        'middleware' => 'can:icda.lines.destroy'
    ]);
    $router->bind('color', function ($id) {
        return app('Modules\Icda\Repositories\ColorRepository')->find($id);
    });
    $router->get('colors', [
        'as' => 'admin.icda.color.index',
        'uses' => 'ColorController@index',
        'middleware' => 'can:icda.colors.index'
    ]);
    $router->get('colors/create', [
        'as' => 'admin.icda.color.create',
        'uses' => 'ColorController@create',
        'middleware' => 'can:icda.colors.create'
    ]);
    $router->post('colors', [
        'as' => 'admin.icda.color.store',
        'uses' => 'ColorController@store',
        'middleware' => 'can:icda.colors.create'
    ]);
    $router->get('colors/{color}/edit', [
        'as' => 'admin.icda.color.edit',
        'uses' => 'ColorController@edit',
        'middleware' => 'can:icda.colors.edit'
    ]);
    $router->put('colors/{color}', [
        'as' => 'admin.icda.color.update',
        'uses' => 'ColorController@update',
        'middleware' => 'can:icda.colors.edit'
    ]);
    $router->delete('colors/{color}', [
        'as' => 'admin.icda.color.destroy',
        'uses' => 'ColorController@destroy',
        'middleware' => 'can:icda.colors.destroy'
    ]);
// append







});
