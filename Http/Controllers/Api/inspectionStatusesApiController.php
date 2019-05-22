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
class InspectionStatusesApiController extends BaseApiController
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

      // $auth=\Auth::guard('api')->user() ? \Auth::guard('api')->user() : $this->getAuthUser();
      // if($auth){
      //   if($auth->hasAccess('icda.inspections.checkIn')){
      //     unset($statuses[0]);
      //     unset($statuses[3]);
      //     unset($statuses[2]);
      //     unset($statuses[4]);
      //     unset($statuses[5]);
      //     unset($statuses[6]);
      //   }else if($auth->hasAccess('icda.inspections.register')){
      //     unset($statuses[1]);
      //   }else if(!$auth->hasAccess('icda.inspections.all')){
      //     $statuses=[];
      //   }
      // }
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
