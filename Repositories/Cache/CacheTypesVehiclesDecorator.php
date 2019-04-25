<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\TypesVehiclesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTypesVehiclesDecorator extends BaseCacheDecorator implements TypesVehiclesRepository
{
    public function __construct(TypesVehiclesRepository $types_vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.types_vehicles';
        $this->repository = $types_vehicles;
    }
}
