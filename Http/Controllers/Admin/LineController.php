<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Line;
use Modules\Icda\Http\Requests\CreateLineRequest;
use Modules\Icda\Http\Requests\UpdateLineRequest;
use Modules\Icda\Repositories\LineRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LineController extends AdminBaseController
{
    /**
     * @var LineRepository
     */
    private $line;

    public function __construct(LineRepository $line)
    {
        parent::__construct();

        $this->line = $line;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$lines = $this->line->all();

        return view('icda::admin.lines.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icda::admin.lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLineRequest $request
     * @return Response
     */
    public function store(CreateLineRequest $request)
    {
        $this->line->create($request->all());

        return redirect()->route('admin.icda.line.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icda::lines.title.lines')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Line $line
     * @return Response
     */
    public function edit(Line $line)
    {
        return view('icda::admin.lines.edit', compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Line $line
     * @param  UpdateLineRequest $request
     * @return Response
     */
    public function update(Line $line, UpdateLineRequest $request)
    {
        $this->line->update($line, $request->all());

        return redirect()->route('admin.icda.line.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icda::lines.title.lines')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Line $line
     * @return Response
     */
    public function destroy(Line $line)
    {
        $this->line->destroy($line);

        return redirect()->route('admin.icda.line.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::lines.title.lines')]));
    }
}
