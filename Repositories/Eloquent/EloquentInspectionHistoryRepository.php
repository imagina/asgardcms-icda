<?php

namespace Modules\Icda\Repositories\Eloquent;

use Modules\Icda\Repositories\InspectionHistoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Icda\Events\InspectionHistoryWasCreated;
use Modules\Icda\Events\RecordListInspections;
use Modules\Icda\Events\MigrateVehicle;

class EloquentInspectionHistoryRepository extends EloquentBaseRepository implements InspectionHistoryRepository
{
  public function create($data)
  {
      $inspectionHistory = $this->model->create($data);
      //Event to create inventory items of inspection
      event(new InspectionHistoryWasCreated($inspectionHistory,$data));
      $inspection=$inspectionHistory->inspection;
      if(isset($data['status'])){
          if($data['status']==2){
              event(new MigrateVehicle($inspection));
          }
      }
      event(new RecordListInspections($inspection));
      return $inspectionHistory;
  }
}
