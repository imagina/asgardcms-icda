<?php

namespace Modules\Icda\Transformers;
use Modules\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\Resource;

class VehiclesTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'serviceType'=>$this->service_type,
      'typeVehicle'=>$this->type_vehicle,
      'typeFuel'=>$this->type_fuel,
      'brand'=>$this->brand,
      'line'=>$this->line,
      'model'=>$this->model,
      'color'=>$this->color,
      'transitLicense'=>$this->transit_license,
      'enrollmentDate'=>$this->enrollment_date,
      'board'=>$this->board,
      'chasisNumber'=>$this->chasis_number,
      'engineNumber'=>$this->engine_number,
      'displacement'=>$this->displacement,
      'axesNumber'=>$this->axes_number,
      // 'weight'=>$this->weight,
      'insuranceExpedition'=>$this->insurance_expedition,
      'insuranceExpiration'=>$this->insurance_expiration,
      'user'=>new UserTransformer($this->user),
      'createdAtDate' => $this->created_at->format('Y-m-d'),
      'createdAtTime' => $this->created_at->format('H:m:s'),
      'updateAtDate' => $this->updated_at->format('Y-m-d'),
      'updateAtTime' => $this->updated_at->format('H:m:s'),
    ];
    if($this->insurance_expiration && $this->insurance_expiration!=null){
      if($this->insurance_expiration<(\Carbon\Carbon::now()))
        $data['insurance_status']=false;//No vigente
      else
        $data['insurance_status']=true;//Vigente
    }else
      $data['insurance_status']=false;//No vigente
    return $data;
  }
}
