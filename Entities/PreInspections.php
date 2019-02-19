<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class PreInspections extends Model
{
  protected $table = 'icda__pre_inspections';
  protected $fillable = ['name','type','values'];

  protected $fakeColumns = ['values'];

  protected $casts = [
    'values' => 'array'
  ];
}
