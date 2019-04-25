<?php

namespace Modules\Icda\Repositories\Cache;

use Modules\Icda\Repositories\ColorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheColorDecorator extends BaseCacheDecorator implements ColorRepository
{
    public function __construct(ColorRepository $color)
    {
        parent::__construct();
        $this->entityName = 'icda.colors';
        $this->repository = $color;
    }
}
