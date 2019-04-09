<?php

namespace Modules\Icda\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use Translatable;

    protected $table = 'icda__inventories';
    public $translatedAttributes = ['name'];
    protected $fillable = ['status'];
    
    public function itemsInventory(){
      return $this->hasMany('Modules\Icda\Entities\InspectionInventory','inventory_id');//inventory_id Foreign key
    }
}
