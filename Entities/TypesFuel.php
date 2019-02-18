<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class TypesFuel extends Model
{
  protected $table = 'icda__types_fuels';
  protected $fillable = ['name'];
}
