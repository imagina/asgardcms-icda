<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class HojaDeTrabajoExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="hojatrabajo";
    protected $primaryKey="idhojapruebas";
    public $timestamps = false;
    protected $fillable = [
      //Vehicle data
      "idhojapruebas",
      "estadototal",
      "fechainicial",
      "fechafinal",
      "idvehiculo",
      "reinspeccion",
      "factura",
      "jefelinea",
      "pin0",
      "pin1",
      "usuario",
      "sicov",
    ];
}
