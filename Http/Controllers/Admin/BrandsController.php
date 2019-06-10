<?php

namespace Modules\Icda\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icda\Entities\Brands;
use Modules\Icda\Http\Requests\CreateBrandsRequest;
use Modules\Icda\Http\Requests\UpdateBrandsRequest;
use Modules\Icda\Repositories\BrandsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Icda\Imports\BrandsImport;
use Maatwebsite\Excel\Facades\Excel;
class BrandsController extends AdminBaseController
{
    /**
     * @var BrandsRepository
     */
    private $brands;

    public function __construct(BrandsRepository $brands)
    {
        parent::__construct();

        $this->brands = $brands;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $brands = $this->brands->all();

        return view('icda::admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icda::admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBrandsRequest $request
     * @return Response
     */
    public function store(CreateBrandsRequest $request)
    {
        $this->brands->create($request->all());

        return redirect()->route('admin.icda.brands.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icda::brands.title.brands')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Brands $brands
     * @return Response
     */
    public function edit(Brands $brands)
    {
        return view('icda::admin.brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Brands $brands
     * @param  UpdateBrandsRequest $request
     * @return Response
     */
    public function update(Brands $brands, UpdateBrandsRequest $request)
    {
        $this->brands->update($brands, $request->all());

        return redirect()->route('admin.icda.brands.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icda::brands.title.brands')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Brands $brands
     * @return Response
     */
    public function destroy(Brands $brands)
    {
        $this->brands->destroy($brands);

        return redirect()->route('admin.icda.brands.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icda::brands.title.brands')]));
    }

    public function indexImport()
    {
      return view('icda::admin.brands.bulkload.index');
    }

    public function import(Request $request){
      $msg="";
      try {
        // dd($request->importfile);
        Excel::import(new BrandsImport(), $request->importfile);
        $msg=trans('icda::brands.bulkload.success migrate from brands');
        return redirect()->route('admin.icda.brands.index')
        ->withSuccess($msg);
      } catch (Exception $e) {
        $msg  =  trans('icda::vehicles.bulkload.error in migrate from page');
        return redirect()->route('admin.icda.brands.index')
        ->withError($msg);
      }
    }//importProducts()
}
