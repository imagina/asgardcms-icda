<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class InspectionInventoryTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'evaluation' => $this->evaluation,
      'quantity' => $this->quantity,
      'name'=>$this->inventory->name,
      //'inventory'=>new InventoryTransformer($this->inventory),
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];

    return $data;
  }
}
