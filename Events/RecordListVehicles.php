<?php

namespace Modules\Icda\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class RecordListVehicles implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $message;
     public $vehicle;

     public function __construct($vehicle)
     {
         $this->message  = trans('icda::vehicles.pusher.new vehicle created')."{$vehicle->board}";
         $this->vehicle  =$vehicle;
     }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
     public function broadcastOn()
     {
         return ['vehicles-list'];
     }
}
