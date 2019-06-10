<?php

namespace Modules\Icda\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;



class RecordListVehicles implements ShouldBroadcastNow
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

    public function broadcastWith()
    {
        return [
            "vehicle"=>  $this->vehicle,
            "message"=> $this->message,
            "board"=>$this->vehicle->board
        ];
    }

    public function broadcastAs()
    {
        return 'vehicles';
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new Channel('vehicle-list');
    }
}
