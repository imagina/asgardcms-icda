<?php

namespace Modules\Icda\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface InspectionHistoryRepository extends BaseRepository
{
  public function create($data);

}
