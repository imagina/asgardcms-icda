<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\VehiclesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheVehiclesDecorator extends BaseCacheDecorator implements VehiclesRepository
{
    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.types_vehicles';
        $this->repository = $vehicles;
    }
}
