<?php

namespace Modules\Icda\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
//use Modules\Icda\Entities\Inspections;


// class RecordListInspections implements ShouldBroadcastNow
class RecordListInspections implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    //public $inspection;
    public $message;
    public $inspection_id;
    public $inspection;
    public function __construct($inspection)
    {
        $usr=\Auth::guard('api')->user();
        //$this->message  = trans('icda::inspections.title.inspection')." # {$inspection->id} ".trans('icda::inspections.pusher.has been created by')." {$usr->first_name} {$usr->last_name}";
        $this->message  = trans('icda::inspections.title.inspection')." # {$inspection->id} ".trans('icda::inspections.pusher.updated to')." ".icda_get_Inspectionstatus()->get($inspection->inspection_status)." ".trans('icda::inspections.pusher.by')." {$usr->first_name} {$usr->last_name}";
        $this->inspection_id=$inspection->id;
        $this->inspection=$inspection;
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        // return new Channel('inspections-list');
        return ['inspections-list'];
    }
}
