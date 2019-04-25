<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/brands'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.brand.create',
    'uses' => 'BrandApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.brand.index',
    'uses' => 'BrandApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.brand.update',
    'uses' => 'BrandApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.brand.delete',
    'uses' => 'BrandApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.brand.show',
    'uses' => 'BrandApiController@show',
  ]);

});
