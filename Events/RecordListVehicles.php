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

     public function __construct($board)
     {
         $this->message  = "A new vehicle has been created with the board {$board}";
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
