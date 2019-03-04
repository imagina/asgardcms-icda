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
    'types_vehicles_id',
    'types_fuels_id',
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
    'weight',
    'insurance_expedition',
    'insurance_expiration',
    'gas_certificate',
    'gas_certifier',
    'gas_certificate_expiration',
    'user_id'
  ];

  public function type_vehicle()
  {
    return $this->belongsTo('Modules\Icda\Entities\TypesVehicles', 'types_vehicles_id');
  }
  public function type_fuel()
  {
    return $this->belongsTo('Modules\Icda\Entities\TypesFuel', 'types_fuels_id');
  }
}
