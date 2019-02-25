<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/vehicles'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.vehicles.create',
    'uses' => 'VehiclesApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.vehicles.index',
    'uses' => 'VehiclesApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.vehicles.update',
    'uses' => 'VehiclesApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.vehicles.delete',
    'uses' => 'VehiclesApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.vehicles.show',
    'uses' => 'VehiclesApiController@show',
  ]);

});
