<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Color;
use Modules\Icda\Http\Requests\CreateColorRequest;
use Modules\Icda\Http\Requests\UpdateColorRequest;
use Modules\Icda\Repositories\ColorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ColorController extends AdminBaseController
{
    /**
     * @var ColorRepository
     */
    private $color;

    public function __construct(ColorRepository $color)
    {
        parent::__construct();

        $this->color = $color;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$colors = $this->color->all();

        return view('icda::admin.colors.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icda::admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateColorRequest $request
     * @return Response
     */
    public function store(CreateColorRequest $request)
    {
        $this->color->create($request->all());

        return redirect()->route('admin.icda.color.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icda::colors.title.colors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Color $color
     * @return Response
     */
    public function edit(Color $color)
    {
        return view('icda::admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Color $color
     * @param  UpdateColorRequest $request
     * @return Response
     */
    public function update(Color $color, UpdateColorRequest $request)
    {
        $this->color->update($color, $request->all());

        return redirect()->route('admin.icda.color.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icda::colors.title.colors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Color $color
     * @return Response
     */
    public function destroy(Color $color)
    {
        $this->color->destroy($color);

        return redirect()->route('admin.icda.color.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::colors.title.colors')]));
    }
}
