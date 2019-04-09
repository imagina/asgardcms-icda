<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateVehiclesRequest;
use Modules\Icda\Http\Requests\UpdateVehiclesRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\VehiclesTransformer;

// Entities
use Modules\Icda\Entities\Vehicles;

// Repositories
use Modules\Icda\Repositories\VehiclesRepository;

class VehiclesApiController extends BaseApiController
{

  private $vehicle;


  public function __construct(VehiclesRepository $vehicle)
  {
    $this->vehicle = $vehicle;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $vehicles = $this->vehicle->getItemsBy($this->getParamsRequest($request));
      //Response
      $response = ['data' => VehiclesTransformer::collection($vehicles)];
      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($vehicles)] : false;

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
      $vehicle = $this->vehicle->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $vehicle ? new VehiclesTransformer($vehicle) : '',
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
      $this->validateRequestApi(new CreateVehiclesRequest($request->all()));
      //Create
      $this->vehicle->create($request->all());

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
      $data=$request->all();
      if(isset($request->board)){
        $vehicleBoard=Vehicles::where('board',$request->board)->where('id','!=',$criteria)->first();
        if($vehicleBoard)
        return redirect()->back()->withError(trans('icda::vehicles.validation.vehicle board exists'));
        else
          unset($data['board']);
      }
      //Validate Request
      $this->validateRequestApi(new UpdateVehiclesRequest($data));
      //Update
      $this->vehicle->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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

      $this->vehicle->deleteBy($criteria,$this->getParamsRequest($request));

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
