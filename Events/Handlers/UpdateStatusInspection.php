<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionHistoryWasCreated;
use Modules\Icda\Entities\Inspections;

class UpdateStatusInspection
{
    /**
     * @var Setting
     */

    public function __construct()
    {

    }

    /**
     * @param InspectionHistoryWasCreated $event
     */
    public function handle(InspectionHistoryWasCreated $event)
    {

        $entity = $event->entity;//Entity InspectionHistory
        $Inspection=Inspections::find($entity->inspections_id);
        $Inspection->inspection_status=$entity->status;
        $Inspection->update();
    }
}
