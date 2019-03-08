<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class InspectionsTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'vehicle' => new VehiclesTransformer($this->vehicle),
      'inspectionType' => new InspectionsTypesTransformer($this->inspectionType),
      'preInspections' => $this->pre_inspections,
      'axes' => $this->axes,
      // 'preInspections' => PreInspectionsPivotTransformer::collection($this->preInspections),
      'itemsInventory' => InspectionInventoryTransformer::collection($this->itemsInventory),
      // 'types_vehicles_id'=>$this->types_vehicles_id,
      'typeVehicle'=>$this->type_vehicle,
      'teachingVehicle' => $this->teaching_vehicle,
      'mileage' => $this->mileage,
      'exhostoDiameter' => $this->exhosto_diameter,
      'engineCylinders' => $this->engine_cylinders,
      'gasCertificate'=>$this->gas_certificate,
      'gasCertifier'=>$this->gas_certifier,
      'gasCertificate_expiration'=>$this->gas_certificate_expiration,
      'governor'=>$this->governor,
      'taximeter'=>$this->taximeter,
      'polarizedGlasses'=>$this->polarized_glasses,
      'armoredVehicle'=>$this->armored_vehicle,
      'modifiedEngine'=>$this->modified_engine,
      'spareTires'=>$this->spare_tires,
      'observations'=>$this->observations,
      'vehiclePrepared'=>$this->vehicle_prepared,
      'seenTechnicalDirector'=>$this->seen_technical_director,
      'vehicleDeliverySignature'=>$this->vehicle_delivery_signature,
      'signatureReceivedReport'=>$this->signature_received_report,
      'options'=>$this->options,
      'createdAtDate' => $this->created_at->format('Y-m-d'),
      'createdAtTime' => $this->created_at->format('H:m:s'),
      'updateAtDate' => $this->updated_at->format('Y-m-d'),
      'updateAtTime' => $this->updated_at->format('H:m:s'),
    ];

    return $data;
  }
}
