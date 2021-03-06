<?php

namespace Modules\Icda\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface InspectionsRepository extends BaseRepository
{
  public function getItem($criteria,$params);//getItem()
  public function getItemsBy($params);//getItemsBy
  public function updateBy($criteria, $data, $params);//updateBy
  public function deleteBy($criteria, $params);//deleteBy
  public function create($data);
}
