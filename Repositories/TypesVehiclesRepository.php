<?php

namespace Modules\Icda\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface TypesVehiclesRepository extends BaseRepository
{
  public function getItem($criteria,$params);
  public function getItemsBy($params);
  public function updateBy($criteria, $data, $params);
  public function deleteBy($criteria, $params);
}
