<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class BrandsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'icda__brands_translations';
}
