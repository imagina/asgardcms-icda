<?php

namespace Modules\Icda\Events;

use Illuminate\Queue\SerializesModels;

class MigrateVehicle
{
    use SerializesModels;
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

    /**
     * Return the ALL data sent
     * @return array
     */

    public function getSubmissionData()
    {
        return $this->data;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
