<?php

namespace Modules\Icda\Entities;

/**
 * Class Status
 * @package Modules\Icda\Entities
 */
class InspectionStatus
{

    const ONHOLD = 0;//Espera registro inicial
    const REVISED = 1;//REVISADO
    const INVOICED = 2;//REVISADO
    const APPROVED = 3;//Aprobado
    const REJECTED = 4;//RECHAZADO
    const CANCELED = 5;//CANCELADO o ANULADO
    // Permiso register: 0 en espera, 2 facturado, 4 rechazado y 5 cancelado (anulado)
    //Permiso checkin solo puede ver facturado.
    //Permiso all puede ver todos los estados
    /**
    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::ONHOLD => trans('icda::inspection_status.onhold'),
            self::REVISED => trans('icda::inspection_status.revised'),
            self::INVOICED => trans('icda::inspection_status.invoiced'),
            self::APPROVED => trans('icda::inspection_status.approved'),
            self::REJECTED => trans('icda::inspection_status.rejected'),
            self::CANCELED => trans('icda::inspection_status.canceled'),
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
