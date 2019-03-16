<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class InspectionHistory extends Model
{

    protected $table = 'icda__inspectionhistories';
    protected $fillable = [
      'inspections_id',
      'status',
      //'notify',
      'comment'
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspections::class);
    }
}
