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
      // 'createdAtDate' => $this->created_at->format('Y-m-d'),
      // 'createdAtTime' => $this->created_at->format('H:m:s'),
      // 'updateAtDate' => $this->updated_at->format('Y-m-d'),
      // 'updateAtTime' => $this->updated_at->format('H:m:s'),
    ];

    return $data;
  }
}
