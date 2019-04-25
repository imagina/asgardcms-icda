<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Entities
use Modules\Icda\Entities\InspectionStatus;

//DB to transactions
use DB;
class InspectionStatuesApiController extends BaseApiController
{



  public function __construct()
  {
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      $statuses = new InspectionStatus();
      $statuses=$statuses->lists();
      //Response
      $response = ['data' => $statuses];

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
