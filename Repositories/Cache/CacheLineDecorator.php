<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\LineRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLineDecorator extends BaseCacheDecorator implements LineRepository
{
    public function __construct(LineRepository $line)
    {
        parent::__construct();
        $this->entityName = 'icda.lines';
        $this->repository = $line;
    }
}
