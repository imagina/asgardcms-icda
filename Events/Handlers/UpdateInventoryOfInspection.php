<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasUpdated;
use Modules\Icda\Entities\InspectionInventory;//Pivot
use Modules\Icda\Entities\Inventory;//Pivot
use Modules\Icda\Http\Requests\UpdateInspectionInventoryRequest;
use Validator;

class UpdateInventoryOfInspection
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
        $items=$event->data['items'];//Items inventory
        foreach($items as $item){
          //Make Request data
          $request=new UpdateInspectionInventoryRequest($item);
          //Create Validator
          $validator = Validator::make($request->all(), $request->rules());
          //if get errors, throw errors
          if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            throw new \Exception(json_encode($errors), 401);
          }
          $inspectionInventory=InspectionInventory::find($item['inspection_inventory_id']);
          $inspectionInventory->update($item);
        }//inventories
    }
}
