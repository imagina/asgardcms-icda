<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspectionStatuses'/*,'middleware' => ['auth:api']*/], function (Router $router) {

  $router->get('/', [
    'as' => 'api.icda.inspectionStatuses.index',
    'uses' => 'inspectionStatusesApiController@index',
  ]);
  // $router->put('/{criteria}', [
  //   'as' => 'api.icda.inspectionHistory.update',
  //   'uses' => 'inspectionHistoryApiController@update',
  // ]);
  // $router->delete('/{criteria}', [
  //   'as' => 'api.icda.inspectionHistory.delete',
  //   'uses' => 'inspectionHistoryApiController@delete',
  // ]);
});
