<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspectionHistory'/*,'middleware' => ['auth:api']*/], function (Router $router) {

  $router->post('/', [
    'as' => 'api.icda.inspectionHistory.create',
    'uses' => 'inspectionHistoryApiController@create',
  ]);
  // $router->get('/', [
  //   'as' => 'api.icda.inspectionHistory.index',
  //   'uses' => 'inspectionHistoryApiController@index',
  // ]);
  // $router->put('/{criteria}', [
  //   'as' => 'api.icda.inspectionHistory.update',
  //   'uses' => 'inspectionHistoryApiController@update',
  // ]);
  // $router->delete('/{criteria}', [
  //   'as' => 'api.icda.inspectionHistory.delete',
  //   'uses' => 'inspectionHistoryApiController@delete',
  // ]);
});
