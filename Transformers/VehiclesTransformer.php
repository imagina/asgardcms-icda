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
      'service_type'=>$this->service_type,
      'type_vehicle'=>$this->type_vehicle,
      'type_fuel'=>$this->type_fuel,
      'brand'=>$this->brand,
      'line'=>$this->line,
      'model'=>$this->model,
      'color'=>$this->color,
      'transit_license'=>$this->transit_license,
      'enrollment_date'=>$this->enrollment_date,
      'board'=>$this->board,
      'chasis_number'=>$this->chasis_number,
      'engine_number'=>$this->engine_number,
      'displacement'=>$this->displacement,
      'axes_number'=>$this->axes_number,
      'insurance_expedition'=>$this->insurance_expedition,
      'insurance_expiration'=>$this->insurance_expiration,
      'user'=>new UserTransformer($this->user),
      'created_at_date' => $this->created_at->format('Y-m-d'),
      'created_at_time' => $this->created_at->format('H:m:s'),
      'update_at_date' => $this->updated_at->format('Y-m-d'),
      'update_at_time' => $this->updated_at->format('H:m:s'),
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
