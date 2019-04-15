<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspections'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

  $router->post('/', [
    'as' => $locale . 'api.icda.inspections.create',
    'uses' => 'InspectionsApiController@create',
     'middleware' => ['auth:api']

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
  $router->post('/media/upload', [
      'as' => 'api.profile.users.media.upload',
      'uses' => 'InspectionsApiController@mediaUpload',
      // 'middleware' => ['auth:api']
  ]);
  $router->post('/media/delete', [
      'as' => 'api.profile.users.media.delete',
      'uses' => 'InspectionsApiController@mediaDelete',
      // 'middleware' => ['auth:api']
  ]);
});
