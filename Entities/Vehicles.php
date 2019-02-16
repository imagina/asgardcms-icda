<?php

namespace Modules\Icda\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    //use Translatable;

    protected $table = 'icda__vehicles';
    public $translatedAttributes = [];
    protected $fillable = [];
}
