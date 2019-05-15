<?php

return [
    'icda.vehicles' => [
        'index' => 'icda::vehicles.list resource',
        'create' => 'icda::vehicles.create resource',
        'edit' => 'icda::vehicles.edit resource',
        'destroy' => 'icda::vehicles.destroy resource',
    ],
    'icda.brands' => [
        'index' => 'icda::brands.list resource',
        'create' => 'icda::brands.create resource',
        'edit' => 'icda::brands.edit resource',
        'destroy' => 'icda::brands.destroy resource',
    ],
    'icda.colors' => [
        'index' => 'icda::colors.list resource',
        'create' => 'icda::colors.create resource',
        'edit' => 'icda::colors.edit resource',
        'destroy' => 'icda::colors.destroy resource',
    ],
    'icda.lines' => [
        'index' => 'icda::lines.list resource',
        'create' => 'icda::lines.create resource',
        'edit' => 'icda::lines.edit resource',
        'destroy' => 'icda::lines.destroy resource',
    ],
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
