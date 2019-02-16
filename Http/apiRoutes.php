<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/icda'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Types vehicles
  require('ApiRoutes/typesVehiclesRoutes.php');

});
