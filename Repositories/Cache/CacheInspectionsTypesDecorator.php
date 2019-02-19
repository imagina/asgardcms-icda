<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\InspectionsTypesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheVehiclesDecorator extends BaseCacheDecorator implements InspectionsTypesRepository
{
    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.inspections_types';
        $this->repository = $types_fuels;
    }
}
