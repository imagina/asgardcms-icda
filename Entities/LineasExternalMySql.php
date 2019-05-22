<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class LineasExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="linea";
    protected $primaryKey="idlinea";
    public $timestamps = false;
    protected $fillable = [
      "idmarca",
      "idlinea",
      "idmintrans",
      "nombre",
    ];
}
