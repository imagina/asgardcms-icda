<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class Axes extends Model
{

  protected $table = 'icda__axes';

    protected $fillable = [
      'inspections_id',
      'values'
    ];
}
