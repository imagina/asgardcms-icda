<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspectionHistory'/*,'middleware' => ['auth:api']*/], function (Router $router) {

  $router->post('/', [
    'as' => 'api.icda.inspectionHistory.create',
    'uses' => 'inspectionHistoryApiController@create',
  ]);
});
