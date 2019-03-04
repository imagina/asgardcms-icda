<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\InspectionInventoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheInspectionInventoryDecorator extends BaseCacheDecorator implements InspectionInventoryRepository
{
    public function __construct(InspectionInventoryRepository $inspectioninventory)
    {
        parent::__construct();
        $this->entityName = 'icda.inspectioninventories';
        $this->repository = $inspectioninventory;
    }
}
