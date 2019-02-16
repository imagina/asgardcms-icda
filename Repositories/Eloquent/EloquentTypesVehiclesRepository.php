<?php

namespace Modules\Icda\Repositories\Eloquent;

use Modules\Icda\Repositories\TypesVehiclesRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentTypesVehiclesRepository extends EloquentBaseRepository implements TypesVehiclesRepository
{
  public function getItem($criteria,$params){
    // INITIALIZE QUERY
    $query = $this->model->query();

    /*== RELATIONSHIPS ==*/
    if(in_array('*',$params->include)){//If Request all relationships
      $query->with([]);
    }else{//Especific relationships
      $includeDefault = [];//Default relationships
      if (isset($params->include))//merge relations with default relationships
        $includeDefault = array_merge($includeDefault, $params->include);
      $query->with($includeDefault);//Add Relationships to query
    }

    /*== FIELDS ==*/
    if (is_array($params->fields) && count($params->fields))
      $query->select($params->fields);


    /*== FILTER ==*/
    if (isset($params->filter)) {
      $filter = $params->filter;

      if (isset($filter->field))//Filter by specific field
        $field = $filter->field;
        // find by specific attribute or by id

        $query->where($field ?? 'id', $criteria);

    }//params->filter
    /*== REQUEST ==*/
    return $query->first();
  }//getItem($criteria,$request)
}
