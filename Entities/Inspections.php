<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class Inspections extends Model
{

  protected $table = 'icda__inspections';

    protected $fillable = [
      'inspections_types_id',
      'vehicles_id',
      'teaching_vehicle',
      'mileage',
      'exhosto_diameter',
      'engine_cylinders'
    ];

    public function vehicle(){
      return $this->belongsTo('Modules\Icda\Entities\Vehicles','vehicles_id');
    }
    public function inspectionType(){
      return $this->belongsTo('Modules\Icda\Entities\InspectionsTypes','inspections_types_id');
    }
    public function preInspections(){
      return $this->hasMany('Modules\Icda\Entities\PreInspectionsPivot','inspections_id');//inspections_id Foreign key
    }
    public function axes(){
      return $this->hasMany('Modules\Icda\Entities\Axes','inspections_id');//inspections_id Foreign key
    }

}
