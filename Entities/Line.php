<?php

namespace Modules\Icda\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use Translatable;

    protected $table = 'icda__lines';
    public $translatedAttributes = ['name'];
    protected $fillable = ['status','brand_id'];

    public function brand(){
        return $this->belongsTo('Modules\Icda\Entities\Brands');//inspections_id Foreign key
    }
}
