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
}
