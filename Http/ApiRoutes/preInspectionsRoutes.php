<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/preInspections'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.preinspections.create',
    'uses' => 'PreInspectionsApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.preinspections.index',
    'uses' => 'PreInspectionsApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.preinspections.update',
    'uses' => 'PreInspectionsApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.preinspections.delete',
    'uses' => 'PreInspectionsApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.preinspections.show',
    'uses' => 'PreInspectionsApiController@show',
  ]);

});
