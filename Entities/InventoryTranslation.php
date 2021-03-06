<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'icda__inventory_translations';
}
