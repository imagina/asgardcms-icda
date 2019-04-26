<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasUpdated;
use Modules\Icda\Entities\Vehicles;
use Validator;

class UpdateVehicleOfInspection
{
    /**
     * @var Setting
     */

    public function __construct()
    {

    }

    /**
     * @param InspectionWasUpdated $event
     */
    public function handle(InspectionWasUpdated $event)
    {

        $entity = $event->entity;//Entity Inspection
        if(isset($event->data['tecnomecanica_code'])){
          $tecno_code=$event->data['tecnomecanica_code'];
          $tecno_expedition=null;
          $tecno_expiration=null;
          if(isset($event->data['tecnomecanica_expedition']))
          $tecno_expedition=$event->data['tecnomecanica_expedition'];
          if(isset($event->data['tecnomecanica_expiration']))
          $tecno_expiration=$event->data['tecnomecanica_expiration'];
          $data=[];
          $data['tecnomecanica_code']=$tecno_code;
          if ($tecno_expedition)
          $data['tecnomecanica_expedition']=$tecno_expedition;
          if ($tecno_expiration)
          $data['tecnomecanica_expiration']=$tecno_expiration;
          $vehicle=Vehicles::where('id',$entity->vehicles_id)->update($data);//
        }
    }
}
