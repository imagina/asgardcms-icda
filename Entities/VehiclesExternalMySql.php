<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class VehiclesExternalMySql extends Model
{
    //Steps to multiple connection table
    ///Add connection sql server protected $connection="sqlservercda";
    ///Skip time stamps created_at & updated_at public $timestamps = false;
    //define primary key of table $primaryKey="";
    protected $connection="mariadbcda";
    protected $table="vehiculos";
    protected $primaryKey="idvehiculo";
    public $timestamps = false;
    protected $fillable = [
      //Vehicle data
      "idvehiculo",
      "numero_placa",
      "idpropietarios",
      "idcliente",
      "idservicio",
      "idlinea",
      "idclase",
      "idcolor",
      "idtipocombustible",
      "ano_modelo",
      "numero_motor",
      "numero_serie",
      "numero_tarjeta_propiedad",
      "idsoat",
      "cilindraje",
      "kilometraje",
      "potencia_motor",
      "diametro_escape",
      "imagen",//
      "tipo_vehiculo",//insurance_expiration
      //Inspections data
      "taximetro",
      "cilindros",
      "tiempos",//Sera el ultimo estado de su ultima inspeccion?
      "ensenanza",//Le envio la url completa del tecnomecanica file?
      "idpais",//Fecha del ultimo archivo
      "fecha_matricula",//Ultimo resultado de inspección archivo tecnomecanica
      "blindaje",//que es try count file technical?
      "polarizado",//que es try count?
      "numsillas",//mileage
      "numero_llantas",//engine_cylinders
      "numero_vin",//exhosto_diameter
      "numero_exostos",//teaching_vehicle
      "numero_lote",//motor modificado campo: modified_engine
      //Datos que no se manejan:
      "diseno",//numero del seguro
      "transmision",//Compañia del seguro
      "scooter",//Pais del vehículo (Por defecto CO)
      //Datos que tocaría agregarlos como pre-inspecciones
      "usuario",//servicio especial de vehículo (Por defecto 0)
      "numejes",//tamaño del motor
      "registrorunt",//poder del motor (por defecto 0)
    ];
}
