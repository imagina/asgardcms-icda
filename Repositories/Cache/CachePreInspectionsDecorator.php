<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\PreInspectionsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePreInspectionsDecorator extends BaseCacheDecorator implements PreInspectionsRepository
{
    public function __construct(PreInspectionsRepository $pre_inspections)
    {
        parent::__construct();
        $this->entityName = 'icda.pre_inspections';
        $this->repository = $pre_inspections;
    }
}
