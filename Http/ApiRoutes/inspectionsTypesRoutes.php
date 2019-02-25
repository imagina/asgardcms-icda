<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspectionsTypes'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.inspections.types.create',
    'uses' => 'InspectionsTypesApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.icda.inspections.types.index',
    'uses' => 'InspectionsTypesApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.types.update',
    'uses' => 'InspectionsTypesApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.types.delete',
    'uses' => 'InspectionsTypesApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.icda.inspections.types.show',
    'uses' => 'InspectionsTypesApiController@show',
  ]);

});
