<?php

namespace Modules\Icda\Entities;


class TypesFuel
{
  const GASOLINE = 0;//GASOLINE
  const GAS = 1;//GAS
  const DIESEL = 2;//DIESEL

  /**
   * @var array
   */
  private $typeFuels = [];

  public function __construct()
  {
      $this->typeFuels = [
          self::GASOLINE => trans('icda::type_fuels.gasoline'),
          self::GAS => trans('icda::type_fuels.gas'),
          self::DIESEL => trans('icda::type_fuels.diesel'),
      ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
      return $this->typeFuels;
  }

  /**
   * Get the type vehicle
   * @param int $typeVehicleId
   * @return string
   */
  public function get($typeFuelId)
  {
      if (isset($this->typeFuels[$typeFuelId])) {
          return $this->typeFuels[$typeFuelId];
      }

      return $this->typeFuels[self::GASOLINE];
  }
}
