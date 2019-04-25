<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\BrandsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBrandsDecorator extends BaseCacheDecorator implements BrandsRepository
{
    public function __construct(BrandsRepository $brands)
    {
        parent::__construct();
        $this->entityName = 'icda.brands';
        $this->repository = $brands;
    }
}
