<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Inspections;
use Modules\Icda\Http\Requests\CreateInspectionsRequest;
use Modules\Icda\Http\Requests\UpdateInspectionsRequest;
use Modules\Icda\Repositories\InspectionsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class InspectionsController extends AdminBaseController
{
    /**
     * @var InspectionsRepository
     */
    private $inspections;

    public function __construct(InspectionsRepository $inspections)
    {
        parent::__construct();

        $this->inspections = $inspections;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $inspections = $this->inspections->all();

        return view('icda::admin.inspections.index', compact('inspections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icda::admin.inspections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateInspectionsRequest $request
     * @return Response
     */
    public function store(CreateInspectionsRequest $request)
    {
        $this->inspections->create($request->all());

        return redirect()->route('admin.icda.inspections.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icda::inspections.title.inspections')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Inspections $inspections
     * @return Response
     */
    public function edit(Inspections $inspections)
    {
        //dd($inspections->inspections);
        return view('icda::admin.inspections.edit', compact('inspections'));
    }
    /**
     * Show the form of specified resource.
     *
     * @param  Inspections $inspections
     * @return Response
     */
    public function show(Inspections $inspections)
    {
        return view('icda::admin.inspections.inspections', compact('inspections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Inspections $inspections
     * @param  UpdateInspectionsRequest $request
     * @return Response
     */
    public function update(Inspections $inspections, UpdateInspectionsRequest $request)
    {
        $this->inspections->update($inspections, $request->all());

        return redirect()->route('admin.icda.inspections.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icda::inspections.title.inspections')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Inspections $inspections
     * @return Response
     */
    public function destroy(Inspections $inspections)
    {
        $this->inspections->destroy($inspections);

        return redirect()->route('admin.icda.inspections.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::inspections.title.inspections')]));
    }
}
