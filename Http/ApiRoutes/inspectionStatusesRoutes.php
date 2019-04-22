<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/inspectionStatuses'/*,'middleware' => ['auth:api']*/], function (Router $router) {

  $router->get('/', [
    'as' => 'api.icda.inspectionStatuses.index',
    'uses' => 'inspectionStatusesApiController@index',
  ]);
});
