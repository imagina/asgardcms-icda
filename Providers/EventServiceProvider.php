<?php

namespace Modules\Icda\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Events\Handlers\SaveInventoryOfInspection;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InspectionWasCreated::class => [
           SaveInventoryOfInspection::class
        ]
    ];
}
