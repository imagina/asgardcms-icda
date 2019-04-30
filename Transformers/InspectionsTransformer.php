<?php

namespace Modules\Icda\Transformers;
use Modules\User\Transformers\UserTransformer;

use Illuminate\Http\Resources\Json\Resource;

class InspectionsTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'inspection_status'=>icda_get_Inspectionstatus()->get($this->inspection_status),
      'vehicle' => new VehiclesTransformer($this->vehicle),
      'inspector'=>new UserTransformer($this->inspector),
      'inspection_type' => new InspectionsTypesTransformer($this->inspectionType),
      'pre_inspections' => $this->pre_inspections,
      'axes' => $this->axes,
      'items_inventory' => InspectionInventoryTransformer::collection($this->itemsInventory),
      'type_vehicle'=>$this->type_vehicle,
      'teaching_vehicle' => $this->teaching_vehicle,
      'mileage' => $this->mileage,
      'exhosto_diameter' => $this->exhosto_diameter,
      'engine_cylinders' => $this->engine_cylinders,
      'gas_certificate'=>$this->gas_certificate,
      'gas_certifier'=>$this->gas_certifier,
      'gas_certificate_expiration'=>$this->gas_certificate_expiration,
      'governor'=>$this->governor,
      'taximeter'=>$this->taximeter,
      'polarized_glasses'=>$this->polarized_glasses,
      'armored_vehicle'=>$this->armored_vehicle,
      'modified_engine'=>$this->modified_engine,
      'spare_tires'=>$this->spare_tires,
      'observations'=>$this->observations,
      'vehicle_prepared'=>$this->vehicle_prepared,
      'seen_technical_director'=>$this->seen_technical_director,
      'vehicle_delivery_signature'=>$this->vehicle_delivery_signature,
      'signature_received_report'=>$this->signature_received_report,
      // 'options'=>$this->options,
      'gallery' => $this->gallery,
      'document' => $this->document,
      'created_at_date' => $this->created_at->format('Y-m-d'),
      'created_at_time' => $this->created_at->format('H:m:s'),
      'update_at_date' => $this->updated_at->format('Y-m-d'),
      'update_at_time' => $this->updated_at->format('H:m:s'),
    ];

    return $data;
  }
}
