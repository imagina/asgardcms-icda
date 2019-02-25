<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspections'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.inspections.create',
    'uses' => 'InspectionsApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.inspections.index',
    'uses' => 'InspectionsApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.update',
    'uses' => 'InspectionsApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.delete',
    'uses' => 'InspectionsApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.show',
    'uses' => 'InspectionsApiController@show',
  ]);

});
