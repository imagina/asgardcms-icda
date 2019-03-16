<?php

namespace Modules\Icda\Repositories\Eloquent;

use Modules\Icda\Repositories\InspectionHistoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Icda\Events\InspectionHistoryWasCreated;

class EloquentInspectionHistoryRepository extends EloquentBaseRepository implements InspectionHistoryRepository
{
  public function create($data)
  {
      $inspectionHistory = $this->model->create($data);
      //Event to create inventory items of inspection
      event(new InspectionHistoryWasCreated($inspectionHistory));
      return $inspectionHistory;
  }
}
