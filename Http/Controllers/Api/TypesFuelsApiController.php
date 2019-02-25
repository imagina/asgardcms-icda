<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateTypesFuelsRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\TypesFuelsTransformer;

// Entities
use Modules\Icda\Entities\TypesFuels;

// Repositories
use Modules\Icda\Repositories\TypesFuelsRepository;

class TypesFuelsApiController extends BaseApiController
{

  private $typeFuel;


  public function __construct(TypesFuelsRepository $typeFuel)
  {
    $this->typeFuel = $typeFuel;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $typeFuels = $this->typeFuel->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => TypesFuelsTransformer::collection($typeFuels)];
      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($typeFuels)] : false;

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
      $typeFuel = $this->typeFuel->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $typeFuel ? new TypesFuelsTransformer($typeFuel) : '',
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
      $this->validateRequestApi(new CreateTypesFuelsRequest($request->all()));
      //Create
      $this->typeFuel->create($request->all());

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

      $this->typeFuel->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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

      $this->typeFuel->deleteBy($criteria,$this->getParamsRequest($request));

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
