<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/colors'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.color.create',
    'uses' => 'ColorApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.color.index',
    'uses' => 'ColorApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.color.update',
    'uses' => 'ColorApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.color.delete',
    'uses' => 'ColorApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.color.show',
    'uses' => 'ColorApiController@show',
  ]);

});
