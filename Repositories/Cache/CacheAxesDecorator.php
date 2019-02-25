<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\AxesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAxesDecorator extends BaseCacheDecorator implements AxesRepository
{
    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.axes';
        $this->repository = $axes;
    }
}
