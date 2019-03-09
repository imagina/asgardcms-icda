<?php

namespace Modules\Icda\Http\Controllers\Api;

// Requests & Response
use Modules\Icda\Http\Requests\CreateInspectionsRequest;
use Modules\Icda\Http\Requests\UpdateInspectionsRequest;
use Modules\Icda\Http\Requests\MediaUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Icda\Transformers\InspectionsTransformer;

// Entities
use Modules\Icda\Entities\Inspections;

// Repositories
use Modules\Icda\Repositories\InspectionsRepository;

//DB to transactions
use DB;
class InspectionsApiController extends BaseApiController
{

  private $Inspection;


  public function __construct(InspectionsRepository $Inspection)
  {
    $this->Inspection = $Inspection;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Request to Repository
      $Inspections = $this->Inspection->getItemsBy($this->getParamsRequest($request));

      //Response
      $response = ['data' => InspectionsTransformer::collection($Inspections)];

      //If request pagination add meta-page
      $request->page ? $response['meta'] = ['page' => $this->pageTransformer($Inspections)] : false;

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
      $Inspection = $this->Inspection->getItem($criteria,$this->getParamsRequest($request));

      $response = [
        'data' => $Inspection ? new InspectionsTransformer($Inspection) : '',
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
      //dd($request->all());
      DB::beginTransaction();

      //Validate Request
      $this->validateRequestApi(new CreateInspectionsRequest($request->all()));

      //Create
      $inspection=$this->Inspection->create($request->all());

      //Rename folder galery
      if(isset($request->code))
        Storage::move('assets/icda/inspections/' . $request->code, 'assets/icda/inspections/' . $inspection->id); //rename folder gallery of inspection
      $response = ['data' => ''];
    } catch (\Exception $e) {
      DB::rollBack();

      $status = 500;
      $response = [
        'errors' => $e->getMessage()
      ];
    }
    DB::commit();
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
      $this->validateRequestApi(new UpdateInspectionsRequest($request->all()));
      //Update
      $this->Inspection->updateBy($criteria, $request->all(),$this->getParamsRequest($request));

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

      $this->Inspection->deleteBy($criteria,$this->getParamsRequest($request));

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
    * CREATE A ITEM
    *
    * @param Request $request
    * @return mixed
    */
    public function mediaUpload(Request $request)
    {
      try {
        //Validate Request
        $this->validateRequestApi(new MediaUploadRequest($request->all()));
        $data = $request->all();//Get data
        // $name = $data['nameFile'];
        $code = $data['code'];//Name folder
        $file = $request->file('file');
        $name=$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $nameFile = $name . '.' . $extension;
        $allowedextensions = array('JPG', 'JPEG', 'PNG', 'GIF', 'ICO', 'BMP', 'PDF', 'DOC', 'DOCX', 'ODT', 'MP3', '3G2', '3GP', 'AVI', 'FLV', 'H264', 'M4V', 'MKV', 'MOV', 'MP4', 'MPG', 'MPEG', 'WMV');
        $destination_path = 'assets/icda/inspections/' . $code . '/' . $nameFile;
        $disk = 'publicmedia';
        if (!in_array(strtoupper($extension), $allowedextensions)) {
          throw new Exception(trans('icda::inspections.messages.file not allowed'));
        }
        if (in_array(strtoupper($extension), ['JPG', 'JPEG'])) {
          $image = \Image::make($file);

          \Storage::disk($disk)->put($destination_path, $image->stream($extension, '90'));
        } else {

          \Storage::disk($disk)->put($destination_path, \File::get($file));
        }

        $status = 200;
        $response = ["data" => ['url' => $destination_path]];
      } catch (\Exception $e) {
        \Log::Error($e);
        $status = $this->getStatusError($e->getCode());
        $response = ["errors" => $e->getMessage()];
      }

      return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }

    /**
    * CREATE A ITEM
    *
    * @param Request $request
    * @return mixed
    */
    public function mediaDelete(Request $request)
    {
      try {
        $data = $request->all();//Get data
        $disk = "publicmedia";
        $dirdata = $request->input('file');
        \Storage::disk($disk)->delete($dirdata);
        $status = 200;
        $response = [
          'susses' => [
            'code' => '201',
            "source" => [
              "pointer" => url($request->path())
            ],
            "title" => trans('core::core.messages.resource delete'),
            "detail" => [
            ]
          ]
        ];

      } catch (\Exception $e) {
        \Log::Error($e);
        $status = $this->getStatusError($e->getCode());
        $response = ["errors" => $e->getMessage()];
      }

      return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }
}
