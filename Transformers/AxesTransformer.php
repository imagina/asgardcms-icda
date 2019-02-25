<?php

namespace Modules\Icda\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class AxesTransformer extends Resource
{
  public function toArray($request)
  {
    $data =  [
      'id' => $this->id,
      'values' => $this->values,
      'created_at' => $this->created_at->format('d-m-Y'),
      'updated_at' => $this->updated_at,
    ];

    return $data;
  }
}
