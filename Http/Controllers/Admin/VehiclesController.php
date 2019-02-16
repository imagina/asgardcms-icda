<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Vehicles;
use Modules\Icda\Http\Requests\CreateVehiclesRequest;
use Modules\Icda\Http\Requests\UpdateVehiclesRequest;
use Modules\Icda\Repositories\VehiclesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class VehiclesController extends AdminBaseController
{
    /**
     * @var VehiclesRepository
     */
    private $vehicles;

    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();

        $this->vehicles = $vehicles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$vehicles = $this->vehicles->all();

        return view('icda::admin.vehicles.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icda::admin.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateVehiclesRequest $request
     * @return Response
     */
    public function store(CreateVehiclesRequest $request)
    {
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
        return view('icda::admin.vehicles.edit', compact('vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Vehicles $vehicles
     * @param  UpdateVehiclesRequest $request
     * @return Response
     */
    public function update(Vehicles $vehicles, UpdateVehiclesRequest $request)
    {
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
        $this->vehicles->destroy($vehicles);

        return redirect()->route('admin.icda.vehicles.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::vehicles.title.vehicles')]));
    }
}
