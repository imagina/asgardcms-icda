<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class VehiclesTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'service_type'=>$this->service_type,
      // 'types_vehicles_id'=>$this->types_vehicles_id,
      'type_vehicle'=>$this->type_vehicle->name,
      // 'types_fuels_id'=>$this->types_fuels_id,
      'type_fuel'=>$this->type_fuel->name,
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
      'weight'=>$this->weight,
      'insurance_expedition'=>$this->insurance_expedition,
      'insurance_expiration'=>$this->insurance_expiration,
      'gas_certificate'=>$this->gas_certificate,
      'gas_certifier'=>$this->gas_certifier,
      'gas_certificate_expiration'=>$this->gas_certificate_expiration,
      'created_at' => $this->created_at->format('d-m-Y'),
      'updated_at' => $this->updated_at->format('d-m-Y'),
    ];

    return $data;
  }
}
