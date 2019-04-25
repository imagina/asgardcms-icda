<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class ColorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'icda__color_translations';
}
