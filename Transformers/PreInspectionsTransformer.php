<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PreInspectionsTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'name' => $this->name,
      'type' => $this->type,
      'values' => $this->values,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];

    return $data;
  }
}
