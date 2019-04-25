<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/typesVehicles'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->get('/', [
    'as' => $locale . 'api.icda.types.vehicles.index',
    'uses' => 'TypesVehiclesApiController@index',
  ]);


});
