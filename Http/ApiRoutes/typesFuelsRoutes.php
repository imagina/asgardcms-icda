<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/typesFuels'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->get('/', [
    'as' => $locale . 'api.icda.types.fuels.index',
    'uses' => 'TypesFuelsApiController@index',
  ]);


});
