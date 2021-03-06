<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateVehiclesRequest;
use Modules\Icda\Http\Requests\UpdateVehiclesRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Events\RecordListVehicles;
// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\VehiclesTransformer;

// Entities
use Modules\Icda\Entities\Vehicles;
use Modules\Icda\Entities\Inspections;

// Repositories
use Modules\Icda\Repositories\VehiclesRepository;
use Modules\Icda\Events\MigrateVehicle;
use Carbon\Carbon;
class VehiclesApiController extends BaseApiController
{

  private $vehicle;


  public function __construct(VehiclesRepository $vehicle)
  {
    $this->vehicle = $vehicle;
  }

  public function test(){
    $inspection=Inspections::find(15);
    //dd($inspection,$inspection->vehicle);
    //dd($inspection->axes);
    event(new MigrateVehicle($inspection));
  }//test

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
        \Log::error($e);
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
      $statusCreated=false;
      if($this->getAuthUser() || \Auth::guard('api')->user()){
        //Auth
        if(!$vehicle && isset($request['user_id'])){
          //Create a vehicle
          $data=[
            'board'=>$criteria,
            'user_id'=>$request['user_id']
          ];
          if(isset($request->model))
          $data['model']=$request->model;
          $vehicle=Vehicles::firstOrCreate(["board"=>$criteria],$data);
          event(new RecordListVehicles($vehicle));
          $statusCreated=true;
        }else if($vehicle && isset($request['user_id'])){
          //Updaate owner vehicle
          if(isset($request['filter']))
          unset($request['filter']);
          $vehicle=$this->vehicle->updateBy($vehicle->id, ['user_id'=>$request['user_id']],$this->getParamsRequest($request));
          $vehicle=$this->vehicle->find($vehicle->id);
        }

      }//if auth
      $reinspection=false;
      $inspection=null;
      $DiferenceInDays=0;
      if($vehicle)
        $inspection=Inspections::where('vehicles_id',$vehicle->id)->orderBy('created_at','DESC')->where('inspection_status',4)->first();
      if($inspection){
        $DiferenceInDays = Carbon::parse(Carbon::now()->format("Y-m-d"))->diffInDays($inspection->created_at->format("Y-m-d"));
        if($DiferenceInDays<=15)
        $reinspection=true;
      }
      $response = [
        'data' => $vehicle ? new VehiclesTransformer($vehicle) : '',
        'created'=>$statusCreated,
        'reinspection'=>$reinspection
      ];

    } catch (\Exception $e) {
        \Log::error($e);
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
      $vehicle=$this->vehicle->create($request->all());

      $response = ['data' => $vehicle];

    } catch (\Exception $e) {
        \Log::error($e);
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
        \Log::error($e);
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
        \Log::error($e);
      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    return response()->json($response, $status ?? 200);
  }
}
