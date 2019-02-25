<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/typesFuels'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.types.fuels.create',
    'uses' => 'TypesFuelsApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.types.fuels.index',
    'uses' => 'TypesFuelsApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.types.fuels.update',
    'uses' => 'TypesFuelsApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.types.fuels.delete',
    'uses' => 'TypesFuelsApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.types.fuels.show',
    'uses' => 'TypesFuelsApiController@show',
  ]);

});
