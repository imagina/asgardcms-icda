<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateInspectionsRequest;
use Modules\Icda\Http\Requests\UpdateInspectionsRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\InspectionsTransformer;

// Entities
use Modules\Icda\Entities\Inspections;

// Repositories
use Modules\Icda\Repositories\InspectionsRepository;

//DB to transactions
use DB;
class InspectionsApiController extends BaseApiController
{

  private $Inspection;


  public function __construct(InspectionsRepository $Inspection)
  {
    $this->Inspection = $Inspection;
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

  /** SHOW
   * @param Request $request
   *  URL GET:
   *  &fields = type string
   *  &include = type string
   */
  public function show($criteria, Request $request)
  {
    try {
      //Request to Repository
      $Inspection = $this->Inspection->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $Inspection ? new InspectionsTransformer($Inspection) : '',
      ];

    } catch (\Exception $e) {
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
      $this->validateRequestApi(new CreateInspectionsRequest($request->all()));

      //Create
      $this->Inspection->create($request->all());

      $response = ['data' => ''];
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

  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function update($criteria, Request $request)
  {
    try {
      //Validate Request
      $this->validateRequestApi(new UpdateInspectionsRequest($request->all()));
      //Update
      $this->Inspection->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

      $response = ['data' => ''];

    } catch (\Exception $e) {
      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    return response()->json($response, $status ?? 200);
  }


  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function delete($criteria, Request $request)
  {
    try {

      $this->Inspection->deleteBy($criteria,$this->getParamsRequest($request));

      $response = ['data' => ''];

    } catch (\Exception $e) {
      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    return response()->json($response, $status ?? 200);
  }
}
