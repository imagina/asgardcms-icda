<?php

namespace Modules\Icda\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;


class PreInspectionsApiController extends BaseApiController
{

  private $preInspection;


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
      //Request to Repository

      $response=['data'=>config("asgard.icda.config.preInspections")];
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
