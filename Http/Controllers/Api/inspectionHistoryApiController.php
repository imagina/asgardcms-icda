<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateInspectionHistoryRequest;
use Modules\Icda\Http\Requests\UpdateInspectionHistoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Entities
use Modules\Icda\Entities\InspectionHistory;

// Repositories
use Modules\Icda\Repositories\InspectionHistoryRepository;

//DB to transactions
use DB;
class InspectionHistoryApiController extends BaseApiController
{

  private $InspectionHistory;


  public function __construct(InspectionHistoryRepository $InspectionHistory)
  {
    $this->InspectionHistory = $InspectionHistory;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $Inspections = $this->Inspection->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => InspectionsTransformer::collection($Inspections)];

      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($Inspections)] : false;

    } catch (\Exception $e) {
      //Message Error
      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    return response()->json($response, $status ?? 200);
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create(Request $request)
  {
    try {
      //dd($request->all());
      DB::beginTransaction();

      //Validate Request
      $this->validateRequestApi(new CreateInspectionHistoryRequest($request->all()));

      //Create
      $inspectionHistory=$this->InspectionHistory->create($request->all());

      //Response
      $response = ['data' => $inspectionHistory];
    } catch (\Exception $e) {
      DB::rollBack();

      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    DB::commit();
    return response()->json($response, $status ?? 200);
  }

}
