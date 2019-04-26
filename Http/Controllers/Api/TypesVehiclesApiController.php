<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Entities
use Modules\Icda\Entities\TypesVehicles;

class TypesVehiclesApiController extends BaseApiController
{



  public function __construct()
  {
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    try {

      //$response=['data'=>config("asgard.icda.config.typesVehicles")];
       $typeVehicles = new TypesVehicles();
       $typeVehicles=$typeVehicles->lists();
       $response=['data'=>$typeVehicles];

    } catch (\Exception $e) {
      //Message Error
      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    return response()->json($response, $status ?? 200);
  }

}
