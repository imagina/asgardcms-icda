<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\InspectionHistoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheInspectionHistoryDecorator extends BaseCacheDecorator implements InspectionHistoryRepository
{
    public function __construct(InspectionHistoryRepository $inspectionhistory)
    {
        parent::__construct();
        $this->entityName = 'icda.inspectionhistories';
        $this->repository = $inspectionhistory;
    }
}
