<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InspectionInventory extends Pivot
{

    protected $table = 'icda__inspectioninventories';
    protected $fillable = [
      'inventory_id',
      'inspections_id',
      'evaluation',
      'quantity'
    ];

    public function inventory(){
      return $this->belongsTo('Modules\Icda\Entities\Inventory','inventory_id');
    }
}
