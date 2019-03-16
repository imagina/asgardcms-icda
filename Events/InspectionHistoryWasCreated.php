<?php

namespace Modules\Icda\Events;

// use Illuminate\Queue\SerializesModels;

class InspectionHistoryWasCreated
{
    // use SerializesModels;
    public $entity;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($entity)
    {
      $this->entity=$entity;
    }

    public function getEntity()
    {
        return $this->entity;
    }

}
