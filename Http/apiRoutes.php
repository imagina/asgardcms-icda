<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/icda'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Types vehicles
  require('ApiRoutes/typesVehiclesRoutes.php');
//======   Types fuels
  require('ApiRoutes/typesFuelsRoutes.php');
//======   Vehicles
  require('ApiRoutes/vehiclesRoutes.php');
//======   Inspections Types
  require('ApiRoutes/inspectionsTypesRoutes.php');
//======   Pre Inspections
  require('ApiRoutes/preInspectionsRoutes.php');

});
