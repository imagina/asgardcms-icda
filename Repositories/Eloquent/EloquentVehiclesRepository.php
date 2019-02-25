<?php

namespace Modules\Icda\Repositories\Eloquent;

use Modules\Icda\Repositories\VehiclesRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentVehiclesRepository extends EloquentBaseRepository implements VehiclesRepository
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

  public function getItemsBy($params)
  {

    // INITIALIZE QUERY
    $query = $this->model->query();

    /*== RELATIONSHIPS ==*/
    if(in_array('*',$params->include)){//If Request all relationships
      $query->with([]);
    }else{//Especific relationships
      $includeDefault = ['type_vehicle','type_fuel'];//Default relationships
      if (isset($params->include))//merge relations with default relationships
        $includeDefault = array_merge($includeDefault, $params->include);
      $query->with($includeDefault);//Add Relationships to query
    }

    // FILTERS
    if ($params->filter) {
      $filter = $params->filter;

      //Filter by date
      if (isset($filter->date)) {
        $date = $filter->date;//Short filter date
        $date->field = $date->field ?? 'created_at';
        if (isset($date->from))//From a date
          $query->whereDate($date->field, '>=', $date->from);
        if (isset($date->to))//to a date
          $query->whereDate($date->field, '<=', $date->to);
      }

      //Filter by type fuels
      if(isset($filter->types_fuels_id)){
        $query->where('types_fuels_id',$filter->types_fuels_id);
      }
      //Filter by type vehicles
      if(isset($filter->types_vehicles_id)){
        $query->where('types_vehicles_id',$filter->types_vehicles_id);
      }

      //Order by
      if (isset($filter->order)) {
        $orderByField = $filter->order->field ?? 'created_at';//Default field
        $orderWay = $filter->order->way ?? 'desc';//Default way
        $query->orderBy($orderByField, $orderWay);//Add order to query
      }

    }

    /*== FIELDS ==*/
    if (isset($params->fields) && count($params->fields))
      $query->select($params->fields);

    /*== REQUEST ==*/
    if (isset($params->page) && $params->page) {
      return $query->paginate($params->take);
    } else {
      $params->take ? $query->take($params->take) : false;//Take
      return $query->get();
    }
  }//getItemsBy

  public function updateBy($criteria, $data, $params){

    // INITIALIZE QUERY
    $query = $this->model->query();

    // FILTER
    if (isset($params->filter)) {
      $filter = $params->filter;

      if (isset($filter->field))//Where field
        $query->where($filter->field, $criteria);
      else//where id
        $query->where('id', $criteria);
    }

    // REQUEST
    $model = $query->first();

    if($model) {
      $model->update($data);
    }
    return $model;
  }//updateBy

  public function deleteBy($criteria, $params)
  {
    // INITIALIZE QUERY
    $query = $this->model->query();

    // FILTER
    if (isset($params->filter)) {
      $filter = $params->filter;

      if (isset($filter->field)) //Where field
        $query->where($filter->field, $criteria);
      else //where id
        $query->where('id', $criteria);
    }

    // REQUEST
    $model = $query->first();

    if($model) {
      $model->delete();
    }
  }//deleteBy

}
