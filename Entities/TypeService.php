<?php

namespace Modules\Icda\Entities;

/**
 * Class Status
 * @package Modules\Icda\Entities
 */
class TypeService
{

    const PARTICULAR = 0;
    const PUBLIC = 1;//Aprobado
    const DIPLOMATIC = 2;//
    const OFFICIAL = 3;

    /**
     * @var array
     */
    private $typeServices = [];

    public function __construct()
    {
        $this->typeServices = [
            self::PARTICULAR => trans('icda::type_services.particular'),
            self::PUBLIC => trans('icda::type_services.public'),
            self::DIPLOMATIC => trans('icda::type_services.diplomatic'),
            self::OFFICIAL => trans('icda::type_services.official'),
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->typeServices;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($typeServiceId)
    {
        if (isset($this->typeServices[$typeServiceId])) {
            return $this->typeServices[$typeServiceId];
        }

        return $this->typeServices[self::PARTICULAR];
    }
}
