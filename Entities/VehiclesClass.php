<?php

namespace Modules\Icda\Entities;


class VehiclesClass
{
  const CAR = 1;//AUTOMOVIL
  const BUS = 2;//AdUTOMOVIL
  const BUSETA = 3;//AdUTOMOVIL
  const TRUC = 4;//CAMION
  const VAN = 5;//CAMIONETA
  const CAMPER = 6;//CAMPERO
  const CUATRIMOTO = 19;//CUATRIMOTO
  const MINIBUS = 7;//MICROBUS
  const MOTOCARRO = 14;//MOTOCARRO
  const MOTORCYCLE = 10;//MOTOCICLETA
  const MOTOTRICICLO = 17;//MOTOTRICICLO
  const WITHOUTCLASS = 16;//SIN CLASE
  const TRACTOCAMION = 8;//TRACTOCAMION
  const VOLLET = 9;//VOLQUETA

  /**
   * @var array
   */
  private $vehiclesClass = [];

  public function __construct()
  {
      $this->vehiclesClass = [
        self::CAR => trans('icda::type_vehicles.car'),
        self::TRUC => trans('icda::type_vehicles.truc'),
        self::CAMPER => trans('icda::type_vehicles.camper'),
        self::MINIBUS => trans('icda::type_vehicles.minibus'),
        self::WITHOUTCLASS => trans('icda::type_vehicles.withoutclass'),
        self::VOLLET => trans('icda::type_vehicles.vollet'),
        self::VAN => trans('icda::type_vehicles.van'),
        self::MOTORCYCLE => trans('icda::type_vehicles.motorcycle'),
        self::TRACTOCAMION => "TRACTOCAMION",
        self::MOTOTRICICLO => "MOTOTRICICLO",
        self::MOTOCARRO => "MOTOCARRO",
        self::CUATRIMOTO => "CUATRIMOTO",
        self::BUS => "BUS",
        self::BUSETA => "BUSETA",
      ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
      return $this->vehiclesClass;
  }

  /**
   * Get the type vehicle
   * @param int $typeVehicleId
   * @return string
   */
  public function get($vehicleClassId)
  {
      if (isset($this->vehiclesClass[$vehicleClassId])) {
          return $this->vehiclesClass[$vehicleClassId];
      }

      return $this->vehiclesClass[self::CAR];
  }
}
