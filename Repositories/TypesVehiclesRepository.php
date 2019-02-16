<?php

namespace Modules\Icda\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface TypesVehiclesRepository extends BaseRepository
{
  public function getItem($criteria,$params);
}
