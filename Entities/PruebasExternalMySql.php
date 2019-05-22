<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class PruebasExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="pruebas";
    protected $primaryKey="idprueba";
    public $timestamps = false;
    protected $fillable = [
      //Vehicle data
      "idprueba",
      "idhojapruebas",
      "fechainicial",
      "prueba",
      "estado",
      "fechafinal",
      "idmaquina",
      "idusuario",
      "idtipo_prueba",
    ];
}
