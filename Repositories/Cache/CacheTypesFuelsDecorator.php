<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\TypesFuelsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTypesFuelsDecorator extends BaseCacheDecorator implements TypesFuelsRepository
{
    public function __construct(VehiclesRepository $vehicles)
    {
        parent::__construct();
        $this->entityName = 'icda.types_fuels';
        $this->repository = $types_fuels;
    }
}
