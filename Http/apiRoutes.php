<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/icda'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Types vehicles
  require('ApiRoutes/typesVehiclesRoutes.php');
//======   Vehicles
  require('ApiRoutes/vehiclesRoutes.php');
//======   Inspections Types
  require('ApiRoutes/inspectionsTypesRoutes.php');
//======   Pre Inspections
  require('ApiRoutes/preInspectionsRoutes.php');
  //======   Inspections
    require('ApiRoutes/inspectionsRoutes.php');
  //======   Inventory
    require('ApiRoutes/inventoryRoutes.php');
    //======   Inspection History
    require('ApiRoutes/inspectionHistoryRoutes.php');
    //======   Inspection Statues
    require('ApiRoutes/inspectionStatusesRoutes.php');
});
