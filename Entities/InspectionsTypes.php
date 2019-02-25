<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class InspectionsTypes extends Model
{
  protected $table = 'icda__inspections_types';
  protected $fillable = ['name','description'];
}
