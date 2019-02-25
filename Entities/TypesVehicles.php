<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class TypesVehicles extends Model
{
    protected $table = 'icda__types_vehicles';
    protected $fillable = ['name'];
}
