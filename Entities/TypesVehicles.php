<?php

namespace Modules\Icda\Entities;


class TypesVehicles
{
  const HEAVY = 0;//PESADO
  const LIGHT = 1;//LIGERO
  const MOTORCYCLE = 2;//MOTOCICLETA
  const CAR = 3;//AUTOMOVIL

  /**
   * @var array
   */
  private $typeVehicles = [];

  public function __construct()
  {
      $this->typeVehicles = [
          self::HEAVY => trans('icda::type_vehicles.heavy'),
          self::LIGHT => trans('icda::type_vehicles.light'),
          self::MOTORCYCLE => trans('icda::type_vehicles.motorcycle'),
          self::CAR => trans('icda::type_vehicles.car'),
      ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
      return $this->typeVehicles;
  }

  /**
   * Get the type vehicle
   * @param int $typeVehicleId
   * @return string
   */
  public function get($typeVehicleId)
  {
      if (isset($this->typeVehicles[$typeVehicleId])) {
          return $this->typeVehicles[$typeVehicleId];
      }

      return $this->typeVehicles[self::HEAVY];
  }
}
