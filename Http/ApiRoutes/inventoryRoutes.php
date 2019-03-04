<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inventory'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.inventory.create',
    'uses' => 'InventoryApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.inventory.index',
    'uses' => 'InventoryApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.inventory.update',
    'uses' => 'InventoryApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.inventory.delete',
    'uses' => 'InventoryApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.inventory.show',
    'uses' => 'InventoryApiController@show',
  ]);

});
