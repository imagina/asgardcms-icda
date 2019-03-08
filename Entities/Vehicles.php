<?php

namespace Modules\Icda\Entities;

// use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
  //use Translatable;

  protected $table = 'icda__vehicles';
  protected $fillable = [
    'service_type',
    'type_vehicle',
    'type_fuel',
    'brand',
    'line',
    'model',
    'color',
    'transit_license',
    'enrollment_date',
    'board',
    'chasis_number',
    'engine_number',
    'displacement',
    'axes_number',
    // 'weight',
    'insurance_expedition',
    'insurance_expiration',
    'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('Modules\User\Entities\Sentinel\User', 'user_id');
  }
}
