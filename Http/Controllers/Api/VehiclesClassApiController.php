<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Entities
use Modules\Icda\Entities\VehiclesClass;

class VehiclesClassApiController extends BaseApiController
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

      $vehicleClass = new VehiclesClass();
      $vehicleClass=$vehicleClass->lists();
      $response=['data'=>$vehicleClass];

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
