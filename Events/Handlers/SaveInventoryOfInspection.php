<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Entities\InspectionInventory;//Pivot
use Modules\Icda\Entities\Inventory;//Pivot
use Modules\Icda\Http\Requests\CreateInspectionInventoryRequest;
use Validator;

class SaveInventoryOfInspection
{
    /**
     * @var Setting
     */

    public function __construct()
    {

    }

    /**
     * @param InspectionWasCreated $event
     */
    public function handle(InspectionWasCreated $event)
    {

        $entity = $event->entity;//Entity Inspection
        $items=$event->data['items'];//Items inventory
        foreach($items as $item){
          $data=[];
          //Make Request data
          $request=new CreateInspectionInventoryRequest($item);
          //Create Validator
          $validator = Validator::make($request->all(), $request->rules());
          //if get errors, throw errors
          if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            throw new \Exception(json_encode($errors), 401);
          }
          // dd($inventory,$entity);
          $data=[
            'inspections_id'=>$entity->id,
            'inventory_id'=>$item['inventory_id'],
            'evaluation'=>$item['evaluation'],
            'quantity'=>$item['quantity']
          ];
          $InspectionInventory=InspectionInventory::create($data);
        }//inventories
        // dd($data);
    }
}
