<?php

namespace Modules\Icda\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use Translatable;

    protected $table = 'icda__brands';
    public $translatedAttributes = ['name'];
    protected $fillable = ['status'];

    public function lines()
    {
        return $this->hasMany('Modules\Icda\Entities\Line', 'brand_id');
    }
}
