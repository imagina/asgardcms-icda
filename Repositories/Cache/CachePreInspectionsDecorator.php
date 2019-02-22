<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\PreInspectionsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePreInspectionsDecorator extends BaseCacheDecorator implements PreInspectionsRepository
{
    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.pre_inspections';
        $this->repository = $types_fuels;
    }
}
