<?php

namespace Modules\Icda\Repositories\Eloquent;

use Modules\Icda\Repositories\InspectionsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
//Events
use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Events\InspectionWasUpdated;
use Modules\Icda\Events\RecordListInspections;
class EloquentInspectionsRepository extends EloquentBaseRepository implements InspectionsRepository
{

  /**
   * @param $data
   * @return mixed
   */
  public function create($data)
  {
      $data['inspector_id']=\Auth::guard('api')->user()->id;
      $inspection = $this->model->create($data);
      //Event to create inventory items of inspection
      event(new InspectionWasCreated($inspection,$data));
      //Pusher notification record list inspections
      event(new RecordListInspections($inspection->id));
      return $inspection;
  }

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
      $includeDefault = ['itemsInventory.inventory'];//Default relationships
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
      //Filter by board vehicle
      if(isset($filter->board)){
        $query->whereHas('vehicle',function($query) use($filter){
          $query->where('board',$filter->board);
        });
      }

      //Filter by inspection status
      if(isset($filter->inspection_status)){
        is_array($filter->inspection_status) ? true : $filter->inspection_status = [$filter->inspection_status];
        $query->whereIn('inspection_status',$filter->inspection_status);
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
      if(isset($data['items'])){
        event(new InspectionWasUpdated($model,$data));
      }
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
