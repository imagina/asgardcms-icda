<?php

namespace Modules\Icda\Events;

// use Illuminate\Queue\SerializesModels;

class InspectionHistoryWasCreated
{
    // use SerializesModels;
    public $entity;
    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($entity,$data)
    {
      $this->entity=$entity;
      $this->data=$data;
    }

    public function getEntity()
    {
        return $this->entity;
    }

}
