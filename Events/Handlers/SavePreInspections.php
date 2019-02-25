<?php


namespace Modules\Icda\Events\Handlers;

use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Repositories\AxesRepository;
use Modules\Icda\Entities\PreInspectionsPivot;
use Modules\Icda\Http\Requests\CreatePreInspectionsPivotRequest;
use Validator;

class SavePreInspections
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
        $preInspections=$event->data['pre_inspections'];
        $data=[];
        foreach($preInspections as $preInspection){
          //Make Request data
          $request=new CreatePreInspectionsPivotRequest($preInspection);
          //Create Validator
          $validator = Validator::make($request->all(), $request->rules());
          //if get errors, throw errors
          if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            throw new \Exception(json_encode($errors), 401);
          }
          // dd($preInspection,$entity);
          $data=[
            'inspections_id'=>$entity->id,
            'pre_inspections_id'=>$preInspection['pre_inspection_id'],
            'value'=>$preInspection['value']
          ];
          $preInspection=PreInspectionsPivot::create($data);
        }//preInspections
        // dd($data);
    }
}
