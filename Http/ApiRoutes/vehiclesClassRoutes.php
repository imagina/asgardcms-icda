<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/vehiclesClass'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->get('/', [
    'as' => $locale . 'api.icda.vehicles.class.index',
    'uses' => 'VehiclesClassApiController@index',
  ]);


});
