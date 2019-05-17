<?php

namespace Modules\Icda\Entities;


class TypesFuel
{
  const GASOLINE = 1;//GASOLINE
  const GAS = 1;//GAS
  const DIESEL = 2;//DIESEL
  const GNV = 3;//DIESEL
  const GASOLINAGNV = 4;//DIESEL
  const ELECTRIC = 5;//ELECTRIC
  const HYDROGEN = 6;//ELECTRIC
  const ETANOL = 7;//ELECTRIC
  const BIODIESEL = 8;//ELECTRIC
  const GLP = 9;//ELECTRIC
  const GASOLINEELECTRIC = 10;//ELECTRIC
  const DIESELELECTRIC = 11;//ELECTRIC

  /**
   * @var array
   */
  private $typeFuels = [];

  public function __construct()
  {
      $this->typeFuels = [
          self::GASOLINE => trans('icda::type_fuels.gasoline'),
          //self::GAS => trans('icda::type_fuels.gas'),
          self::DIESEL => trans('icda::type_fuels.diesel'),
          self::GNV => "GNV",
          self::GASOLINAGNV => trans('icda::type_fuels.gasoline')." - GNV",
          self::ELECTRIC => trans('icda::type_fuels.electric'),
          self::HYDROGEN => trans('icda::type_fuels.hydrogen'),
          self::ETANOL => "Etanol",
          self::BIODIESEL => "Biodiesel",
          self::GLP => "GLP",
          self::GASOLINEELECTRIC => trans('icda::type_fuels.gasoline')." - ".trans('icda::type_fuels.electric'),
          self::DIESELELECTRIC => trans('icda::type_fuels.diesel')." - ".trans('icda::type_fuels.electric'),
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
