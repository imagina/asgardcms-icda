<?php

namespace Modules\Icda\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Events\Handlers\SaveAxesOfInspection;
use Modules\Icda\Events\Handlers\SavePreInspections;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InspectionWasCreated::class => [
           SaveAxesOfInspection::class,
           SavePreInspections::class,
        ]
    ];
}
