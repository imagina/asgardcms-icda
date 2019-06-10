<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Vehicles;
use Modules\Icda\Http\Requests\CreateVehiclesRequest;
use Modules\Icda\Http\Requests\UpdateBackendVehiclesRequest;
use Modules\Icda\Repositories\VehiclesRepository;
use Modules\User\Repositories\UserRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\User\Contracts\Authentication;
use Modules\Icda\Imports\VehiclesImport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Icda\Repositories\BrandsRepository;
use Modules\Icda\Repositories\LineRepository;
use Modules\Icda\Repositories\ColorRepository;
use Modules\Icda\Entities\TypeService;
use Modules\Icda\Entities\TypesVehicles;
use Modules\Icda\Entities\TypesFuel;

class VehiclesController extends AdminBaseController
{
  /**
  * @var VehiclesRepository
  */
  private $vehicles;
  private $users;
  protected $auth;
  private $brands;
  private $colors;
  private $lines;
  public function __construct(VehiclesRepository $vehicles,LineRepository $lines,ColorRepository $colors,BrandsRepository $brands,Authentication $auth,UserRepository $users)
  {
    parent::__construct();

    $this->vehicles = $vehicles;
    $this->brands = $brands;
    $this->lines = $lines;
    $this->colors = $colors;
    $this->users = $users;
    $this->auth = $auth;
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $vehicles = $this->vehicles->paginate(20);

    return view('icda::admin.vehicles.index', compact('vehicles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create()
  {
    $users=$this->users->all();
    return view('icda::admin.vehicles.create',['users'=>$users]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  CreateVehiclesRequest $request
  * @return Response
  */
  public function store(CreateVehiclesRequest $request)
  {
    // dd($request->all());
    $this->vehicles->create($request->all());

    return redirect()->route('admin.icda.vehicles.index')
    ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icda::vehicles.title.vehicles')]));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  Vehicles $vehicles
  * @return Response
  */
  public function edit(Vehicles $vehicles)
  {
    $users=$this->users->all();
    $brands=$this->brands->all();
    $lines=$this->lines->all();
    $colors=$this->colors->all();
    $type_services = new TypeService();
    $type_services=$type_services->lists();
    $type_fuels = new TypesFuel();
    $type_fuels=$type_fuels->lists();
    $type_vehicles = new TypesVehicles();
    $type_vehicles=$type_vehicles->lists();
    return view('icda::admin.vehicles.edit', compact('vehicles','brands','lines','colors','users','type_vehicles','type_services','type_fuels'));
  }
  /**
  * Show the form of specified resource.
  *
  * @param  Vehicles $vehicles
  * @return Response
  */
  public function show(Vehicles $vehicles)
  {
    return view('icda::admin.vehicles.inspections', compact('vehicles'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  Vehicles $vehicles
  * @param  UpdateVehiclesRequest $request
  * @return Response
  */
  public function update(Vehicles $vehicles, UpdateBackendVehiclesRequest $request)
  {
    $vehicleBoard=Vehicles::where('board',$request->board)->where('id','!=',$vehicles->id)->first();
    if($vehicleBoard)
    return redirect()->back()->withError(trans('icda::vehicles.validation.vehicle board exists'));
    $this->vehicles->update($vehicles, $request->all());

    return redirect()->route('admin.icda.vehicles.index')
    ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icda::vehicles.title.vehicles')]));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  Vehicles $vehicles
  * @return Response
  */
  public function destroy(Vehicles $vehicles)
  {
    if(count($vehicles->inspections)>0)
    return redirect()->back()->withError(trans('icda::vehicles.validation.vehicle has inspections'));
    $this->vehicles->destroy($vehicles);

    return redirect()->route('admin.icda.vehicles.index')
    ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::vehicles.title.vehicles')]));
  }

  public function indexImport()
  {
    return view('icda::admin.vehicles.bulkload.index');
  }

  public function import(Request $request){
    $msg="";
    try {
      $data = ['user_id' => $this->auth->user()->id];
      Excel::import(new VehiclesImport($this->vehicles,$data), $request->importfile);
      $msg=trans('icda::vehicles.bulkload.success migrate from vehicles');
      return redirect()->route('admin.icda.vehicles.index')
      ->withSuccess($msg);
    } catch (Exception $e) {
      $msg  =  trans('icda::vehicles.bulkload.error in migrate from page');
      return redirect()->route('admin.icda.vehicles.index')
      ->withError($msg);
    }
  }//importProducts()
}
