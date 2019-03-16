<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class Inspections extends Model
{

  protected $table = 'icda__inspections';

  protected $fakeColumns = ['axes','pre_inspections'];
  protected $casts = [
    'axes' => 'array',
    'pre_inspections'=>'array'
  ];
  protected $fillable = [
    'inspections_types_id',
    'vehicles_id',
    'teaching_vehicle',
    'mileage',
    'exhosto_diameter',
    'engine_cylinders',
    'axes',
    'pre_inspections',
    'type_vehicle',
    'gas_certificate',
    'gas_certifier',
    'gas_certificate_expiration',
    'governor',
    'taximeter',
    'polarized_glasses',
    'armored_vehicle',
    'modified_engine',
    'spare_tires',
    'observations',
    'vehicle_prepared',
    'seen_technical_director',
    'vehicle_delivery_signature',
    'signature_received_report',
    'options',
    'inspection_status',
    'inspector_id'
  ];

  public function vehicle(){
    return $this->belongsTo('Modules\Icda\Entities\Vehicles','vehicles_id');
  }
  public function inspectionType(){
    return $this->belongsTo('Modules\Icda\Entities\InspectionsTypes','inspections_types_id');
  }
  public function itemsInventory(){
    return $this->hasMany('Modules\Icda\Entities\InspectionInventory','inspections_id');//inspections_id Foreign key
  }
  public function inspector()
  {
    return $this->belongsTo('Modules\User\Entities\Sentinel\User', 'inspector_id');
  }

  public function inspectionHistory()
  {
    return $this->hasMany(InspectionHistory::class);
  }

  public function getGalleryAttribute()
  {

      $images = \Storage::disk('publicmedia')->files('assets/icda/inspections/' . $this->id);
      if (count($images)) {
          return $images;
      }
      return null;
  }

}
