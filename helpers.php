<?php

use Illuminate\Database\Eloquent\Collection;
use Modules\Icda\Entities\Inspections;
use Modules\Icda\Entities\Order_History;
use Modules\Icda\Entities\InspectionStatus;

/**
 * Get Inspection Status Enabled / Disabled
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icommerce_get_Inspectionstatus')) {

    function icommerce_get_Inspectionstatus()
    {
        $status = new InspectionStatus();
        return $status;
    }
}
