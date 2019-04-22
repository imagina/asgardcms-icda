<?php

namespace Modules\Icda\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RecordListInspections implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $message;
    public $inspection_id;
    public function __construct($inspection_id)
    {
        $usr=\Auth::guard('api')->user();
        $this->message  = "Inspection # {$inspection_id} has been created by {$usr->first_name} {$usr->last_name}";
        $this->$inspection_id=$inspection_id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['inspections-list'];
    }
}
