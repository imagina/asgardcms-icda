<?php

return [
    'icda.vehicles' => [
        'index' => 'icda::vehicles.list resource',
        'create' => 'icda::vehicles.create resource',
        'edit' => 'icda::vehicles.edit resource',
        'destroy' => 'icda::vehicles.destroy resource',
    ],
    // 'icda.brands' => [
    //     'index' => 'icda::brands.list resource',
    //     'create' => 'icda::brands.create resource',
    //     'edit' => 'icda::brands.edit resource',
    //     'destroy' => 'icda::brands.destroy resource',
    // ],
    'icda.inspections' => [
        'index' => 'icda::inspections.list resource',
        'create' => 'icda::inspections.create resource',
        'edit' => 'icda::inspections.edit resource',
        'destroy' => 'icda::inspections.destroy resource',
        'all' => 'icda::inspections.cancel inspection',
        'checkIn' => 'icda::inspections.check inspection',
        'register' => 'icda::inspections.register inspection',
    ],
    'icda.bulkload' => [
        'import' => 'icda::vehicles.bulkload.title'
    ],

];
