<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientesExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="clientes";
    protected $primaryKey="idcliente";
    public $timestamps = false;
    protected $fillable = [
      //Vehicle data
      "numero_identificacion",
      "tipo_identificacion",
      "nombre1",
      "nombre2",
      "apellido1",
      "apellido2",
      "propietario",
      "direccion",
      "telefono1",
      "telefono2",
      "cod_ciudad",
      "numero_licencia",
      "categoria_licencia",
      "observaciones",
      "correo",
      "cumpleanos",
    ];
}
