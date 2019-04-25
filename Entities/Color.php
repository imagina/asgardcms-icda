<?php

namespace Modules\Icda\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use Translatable;

    protected $table = 'icda__colors';
    public $translatedAttributes = ['name'];
    protected $fillable = ['status'];
}
