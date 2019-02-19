<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreatePreInspectionsRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\PreInspectionsTransformer;

// Entities
use Modules\Icda\Entities\PreInspections;

// Repositories
use Modules\Icda\Repositories\PreInspectionsRepository;

class PreInspectionsApiController extends BaseApiController
{

  private $preInspection;


  public function __construct(PreInspectionsRepository $preInspection)
  {
    $this->preInspection = $preInspection;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $preInspections = $this->preInspection->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => PreInspectionsTransformer::collection($preInspections)];

      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($preInspections)] : false;

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
      $preInspection = $this->preInspection->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $preInspection ? new PreInspectionsTransformer($preInspection) : '',
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
      //Validate Request
      $this->validateRequestApi(new CreatePreInspectionsRequest($request->all()));
      //Create
      $this->preInspection->create($request->all());

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
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function update($criteria, Request $request)
  {
    try {

      $this->preInspection->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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

      $this->preInspection->deleteBy($criteria,$this->getParamsRequest($request));

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
