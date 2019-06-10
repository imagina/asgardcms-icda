<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateColorRequest;
use Modules\Icda\Http\Requests\UpdateColorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\ColorTransformer;

// Entities
use Modules\Icda\Entities\Color;

// Repositories
use Modules\Icda\Repositories\ColorRepository;

class ColorApiController extends BaseApiController
{

  private $color;


  public function __construct(ColorRepository $color)
  {
    $this->color = $color;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $colors = $this->color->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => ColorTransformer::collection($colors)];

      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($colors)] : false;

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
      $color = $this->color->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $brand ? new ColorTransformer($color) : '',
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
      $this->validateRequestApi(new CreateColorRequest($request->all()));
      //Create
      // dd($request->all());
      $color = $this->color->create($request->all());
      $response = ['data' => $color];

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
      $this->validateRequestApi(new UpdateColorRequest($request->all()));
      //Update
      $this->color->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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

      $this->color->deleteBy($criteria,$this->getParamsRequest($request));

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
