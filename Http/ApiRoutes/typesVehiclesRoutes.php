<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/typesVehicles'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  // $router->post('/', [
  //   'as' => $locale . 'api.icda.types.vehicles.create',
  //   'uses' => 'TypesVehiclesApiController@create',
  // ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.types.vehicles.index',
    'uses' => 'TypesVehiclesApiController@index',
  ]);
  // $router->put('/{criteria}', [
  //   'as' => $locale . 'api.icda.types.vehicles.update',
  //   'uses' => 'TypesVehiclesApiController@update',
  // ]);
  // $router->delete('/{criteria}', [
  //   'as' => $locale . 'api.icda.types.vehicles.delete',
  //   'uses' => 'TypesVehiclesApiController@delete',
  // ]);
  // $router->get('/{criteria}', [
  //   'as' => $locale . 'api.icda.types.vehicles.show',
  //   'uses' => 'TypesVehiclesApiController@show',
  // ]);

});
