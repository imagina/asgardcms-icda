<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class PreInspectionsPivot extends Model
{

  protected $table = 'icda__pre_inspections_pivots';

    protected $fillable = [
      'pre_inspections_id',
      'inspections_id',
      'value'
    ];
}
