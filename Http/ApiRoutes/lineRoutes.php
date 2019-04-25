<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/lines'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.line.create',
    'uses' => 'LineApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.line.index',
    'uses' => 'LineApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.line.update',
    'uses' => 'LineApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.line.delete',
    'uses' => 'LineApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.line.show',
    'uses' => 'LineApiController@show',
  ]);

});
