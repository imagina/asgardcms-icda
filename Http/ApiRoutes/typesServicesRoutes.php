<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/typesServices'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->get('/', [
    'as' => $locale . 'api.icda.types.services.index',
    'uses' => 'TypesServicesApiController@index',
  ]);

});
