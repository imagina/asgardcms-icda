<?php

namespace Modules\Icda\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Icda\Events\InspectionWasCreated;
use Modules\Icda\Events\InspectionWasUpdated;
use Modules\Icda\Events\InspectionHistoryWasCreated;
use Modules\Icda\Events\Handlers\SaveInventoryOfInspection;
use Modules\Icda\Events\Handlers\UpdateInventoryOfInspection;
use Modules\Icda\Events\Handlers\SaveHistoryOfInspection;
use Modules\Icda\Events\Handlers\UpdateStatusInspection;
use Modules\Icda\Events\Handlers\UpdateVehicleOfInspection;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InspectionWasCreated::class => [
           SaveInventoryOfInspection::class,
           SaveHistoryOfInspection::class
        ],
        InspectionWasUpdated::class => [
           UpdateInventoryOfInspection::class,
           UpdateVehicleOfInspection::class
        ],
        InspectionHistoryWasCreated::class => [
           UpdateStatusInspection::class
        ]
    ];
}
