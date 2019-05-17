<?php

namespace Modules\Icda\Entities;

use Illuminate\Database\Eloquent\Model;

class VehiclesSqlServer extends Model
{
    protected $fillable = [
      //Vehicle data
      "VEHICLE_ID",
      "VEHICLE_PLATE",
      "VEHICLE_MARK",
      "VEHICLE_LINE",
      "VEHICLE_MODEL",
      "VEHICLE_COLOR",
      "VEHICLE_SERVICE",
      "VEHICLE_CLASS",
      "VEHICLE_VIN",
      "VEHICLE_FUEL",
      "VEHICLE_CHASSIS",
      "VEHICLE_MARK_ID",
      "VEHICLE_LINE_ID",
      "VEHICLE_COLOR_ID",
      "VEHICLE_NUMBER_MOTOR",
      "VEHICLE_ENROLLMENT_DATE",
      "VEHICLE_TYPE_VEHICLE",
      "VEHICLE_AXEL_NUMBER",
      "VEHICLE_DATE_EXPEDITION_SURELY",//insurance_expedition
      "VEHICLE_DATE_EXPIRATION_SURELY",//insurance_expiration
      //Inspections data
      "VEHICLE_LAST_INSPECTION_CODE",
      "VEHICLE_LAST_DATE_INSPECTION",
      "VEHICLE_LAST_RESULT_INSPECTION",//Sera el ultimo estado de su ultima inspeccion?
      "VEHICLE_LAST_INSPECTION_CODE_TECHNICAL_FILE",//Le envio la url completa del tecnomecanica file?
      "VEHICLE_LAST_DATE_INSPECTION_TECHNICAL_FILE",//Fecha del ultimo archivo
      "VEHICLE_LAST_RESULT_INSPECTION_TECHNICAL_FILE",//Ultimo resultado de inspección archivo tecnomecanica
      "VEHICLE_TRY_COUNT_TECHNICAL_FILE",//que es try count file technical?
      "VEHICLE_TRY_COUNT",//que es try count?
      "VEHICLE_MILEAGE",//mileage
      "VEHICLE_CYLINDERS",//engine_cylinders
      "VEHICLE_DIAMETER_EXHAUST",//exhosto_diameter
      "USED_TEACH_DRIVING",//teaching_vehicle
      "VEHICLE_ENGINE_MODIFIED",//motor modificado campo: modified_engine
      //Datos que no se manejan:
      "VEHICLE_NUMBER_SURELY",//numero del seguro
      "VEHICLE_COMPANY_SURELY",//Compañia del seguro
      "VEHICLE_COUNTRY",//Pais del vehículo
      //Datos que tocaría agregarlos como pre-inspecciones
      "VEHICLE_MOTOR_SIZE",//tamaño del motor
      "VEHICLE_ENGINE_POWER",//poder del motor
      "VEHICLE_SPECIAL_SERVICE",//servicio especial de vehículo
      "VEHICLE_USE_SHIELD",//vehiculo usa escudo (Equivalente a vehiculo blindado?) campo:armored_vehicle
      "VEHICLE_USE_DARK_GLASSES",//vehiculo usa vidrios oscuros (Equivalente a vidrios polarizados?) campo:polarized_glasses
      "VEHICLE_CHAIRS",//sillas de vehículo
    ];
}
