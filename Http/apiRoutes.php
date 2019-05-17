<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/icda'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Types vehicles
  require('ApiRoutes/typesVehiclesRoutes.php');
//======   Types fuel
  require('ApiRoutes/typesFuelsRoutes.php');
//======   Vehicless Class
  require('ApiRoutes/vehiclesClassRoutes.php');
//======   Types services
  require('ApiRoutes/typesServicesRoutes.php');
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
    //======   Brands
    require('ApiRoutes/brandRoutes.php');
    //======   Lines
    require('ApiRoutes/lineRoutes.php');
    //======   Colors
    require('ApiRoutes/colorRoutes.php');
});
