<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateInventoryRequest;
use Modules\Icda\Http\Requests\UpdateInventoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\InventoryTransformer;

// Entities
use Modules\Icda\Entities\Inventory;

// Repositories
use Modules\Icda\Repositories\InventoryRepository;

class InventoryApiController extends BaseApiController
{

  private $inventory;


  public function __construct(InventoryRepository $inventory)
  {
    $this->inventory = $inventory;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $inventories = $this->inventory->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => InventoryTransformer::collection($inventories)];

      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($inventories)] : false;

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
      $inventory = $this->inventory->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $inventory ? new InventoryTransformer($inventory) : '',
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
      $this->validateRequestApi(new CreateInventoryRequest($request->all()));
      //Create
      $inventory=$this->inventory->create($request->all());
      $response = ['data' => $inventory];

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
      //Validate Request
      $this->validateRequestApi(new UpdateInventoryRequest($request->all()));
      //Update
      $this->inventory->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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
      
      $this->inventory->deleteBy($criteria,$this->getParamsRequest($request));

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
