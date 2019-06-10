<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class LineTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'name' => $this->name,
      'brand_id'=>$this->brand_id,
      'brand' =>new BrandTransformer($this->whenLoaded('brand')),
      'created_at_date' => $this->created_at->format('Y-m-d'),
      'created_at_time' => $this->created_at->format('H:m:s'),
      'update_at_date' => $this->updated_at->format('Y-m-d'),
      'update_at_time' => $this->updated_at->format('H:m:s'),
    ];

    return $data;
  }
}
