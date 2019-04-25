<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class LineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'icda__line_translations';
}
