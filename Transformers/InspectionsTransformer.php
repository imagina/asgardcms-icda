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
      'preInspections' => PreInspectionsPivotTransformer::collection($this->preInspections),
      'axes' => AxesTransformer::collection($this->axes),
      'itemsInventory' => InspectionInventoryTransformer::collection($this->itemsInventory),
      'teaching_vehicle' => $this->teaching_vehicle,
      'mileage' => $this->mileage,
      'exhosto_diameter' => $this->exhosto_diameter,
      'engine_cylinders' => $this->engine_cylinders,
      'created_at' => $this->created_at->format('d-m-Y'),
      'updated_at' => $this->updated_at,
    ];

    return $data;
  }
}
