<?php

namespace Modules\Icda\Entities;

/**
 * Class Status
 * @package Modules\Icda\Entities
 */
class InspectionStatus
{

    const ONHOLD = 0;
    const APPROVED = 1;
    const COMPLETED = 2;
    const REJECTED = 3;

    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::ONHOLD => trans('icda::inspection_status.onhold'),
            self::APPROVED => trans('icda::inspection_status.approved'),
            self::COMPLETED => trans('icda::inspection_status.completed'),
            self::REJECTED => trans('icda::inspection_status.rejected'),
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->statuses;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->statuses[$statusId])) {
            return $this->statuses[$statusId];
        }

        return $this->statuses[self::ONHOLD];
    }
}
