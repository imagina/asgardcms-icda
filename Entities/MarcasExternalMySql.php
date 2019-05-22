<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class MarcasExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="marca";
    protected $primaryKey="idmarca";
    public $timestamps = false;
    protected $fillable = [
      "idmarca",
      "nombre",
    ];
}
