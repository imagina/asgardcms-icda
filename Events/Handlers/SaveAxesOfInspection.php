<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Repositories\AxesRepository;


class SaveAxesOfInspection
{
    private $axes;
    /**
     * @var Setting
     */

    public function __construct(AxesRepository $axes)
    {
        $this->axes = $axes;
    }

    /**
     * @param InspectionWasCreated $event
     */
    public function handle(InspectionWasCreated $event)
    {

        $entity = $event->entity;
        $axes=[];
        $axes['inspections_id']=$entity->id;
        $axes['values']=$event->data['axes'];//Axes
        $this->axes->create($axes);
    }
}
