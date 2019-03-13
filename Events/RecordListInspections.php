<?php

namespace Modules\Icda\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Modules\Icda\Entities\Inspections;


// class RecordListInspections implements ShouldBroadcastNow
class RecordListInspections implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $inspection;
    public $message;
    public function __construct(Inspections $inspection)
    {
        $this->inspection=$inspection;
        $this->message  = "Inspection # {$inspection->id} has been created for the vehicle with board {$inspection->vehicle->board}";
    }
    // public function broadcastWith()
    // {
    //     return [
    //         $this->inspection
    //     ];
    // }

    // public function broadcastAs()
    // {
    //     return 'newRecord';
    // }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        // return new Channel('record-'.$this->newRecord->product->id);
        return ['inspections-list'];
    }
}
