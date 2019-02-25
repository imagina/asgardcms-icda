<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class TypesVehiclesTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'name' => $this->name,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];

    return $data;
  }
}
