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
    'brand_id',
    'line_id',
    'model',
    'color_id',
    'transit_license',
    'enrollment_date',
    'board',
    'vin_number',
    'chasis_number',
    'engine_number',
    'displacement',
    'axes_number',
    'insurance_expedition',
    'insurance_expiration',
    'tecnomecanica_expiration',
    'tecnomecanica_expedition',
    'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('Modules\User\Entities\Sentinel\User', 'user_id');
  }
  public function brand()
  {
    return $this->belongsTo('Modules\Icda\Entities\Brands', 'brand_id');
  }
  public function line()
  {
    return $this->belongsTo('Modules\Icda\Entities\Line', 'line_id');
  }
  public function color()
  {
    return $this->belongsTo('Modules\Icda\Entities\Color', 'color_id');
  }
  public function inspections(){
    return $this->hasMany('Modules\Icda\Entities\Inspections','vehicles_id');//inspections_id Foreign key
  }
}
