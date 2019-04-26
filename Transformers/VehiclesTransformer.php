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
      'service_type_text'=>icda_get_TypeService()->get($this->service_type),
      'type_vehicle_text'=>icda_get_TypeVehicle()->get($this->type_vehicle),
      'type_fuel_text'=>icda_get_TypeFuel()->get($this->type_fuel),
      'service_type'=>$this->service_type,
      'type_vehicle'=>$this->type_vehicle,
      'type_fuel'=>$this->type_fuel,
      'brand_id'=>$this->brand_id,
      'line_id'=>$this->line_id,
      'model'=>$this->model,
      'color_id'=>$this->color_id,
      'transit_license'=>$this->transit_license,
      'enrollment_date'=>$this->enrollment_date,
      'board'=>$this->board,
      'vin_number'=>$this->vin_number,
      'chasis_number'=>$this->chasis_number,
      'engine_number'=>$this->engine_number,
      'displacement'=>$this->displacement,
      'axes_number'=>$this->axes_number,
      'insurance_expedition'=>$this->insurance_expedition,
      'insurance_expiration'=>$this->insurance_expiration,
      'tecnomecanica_expedition'=>$this->tecnomecanica_expedition,
      'tecnomecanica_expiration'=>$this->tecnomecanica_expiration,
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

    if($this->brand_id)
    $data['brand']=$this->brand->name;
    else
    $data['brand']=$this->brand_id;
    if($this->line_id)
    $data['line']=$this->line->name;
    else
    $data['line']=$this->line_id;
    if($this->color_id)
    $data['color']=$this->color->name;
    else
    $data['color']=$this->color_id;

    return $data;
  }
}
