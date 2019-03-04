<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\InspectionsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheInspectionsDecorator extends BaseCacheDecorator implements InspectionsRepository
{
    public function __construct(InspectionsRepository $inspections)
    {
        parent::__construct();
        $this->entityName = 'icda.inspections';
        $this->repository = $inspections;
    }
}
