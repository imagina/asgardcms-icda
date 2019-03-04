<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\InventoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheInventoryDecorator extends BaseCacheDecorator implements InventoryRepository
{
    public function __construct(InventoryRepository $inventory)
    {
        parent::__construct();
        $this->entityName = 'icda.inventories';
        $this->repository = $inventory;
    }
}
