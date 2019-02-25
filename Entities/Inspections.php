<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class Inspections extends Model
{

  protected $table = 'icda__inspections';

    protected $fillable = [
      'inspections_types_id',
      'teaching_vehicle',
      'mileage',
      'exhosto_diameter',
      'engine_cylinders'
    ];
}
