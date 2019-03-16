<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Entities\InspectionHistory;

class SaveHistoryOfInspection
{
    /**
     * @var Setting
     */

    public function __construct()
    {

    }

    /**
     * @param InspectionWasCreated $event
     */
    public function handle(InspectionWasCreated $event)
    {
        $entity = $event->entity;//Entity Inspection
        $data=[];
        $data['inspections_id']=$entity->id;
        InspectionHistory::create($data);
    }
}
