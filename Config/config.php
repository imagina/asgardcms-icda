<?php

return [
    'name' => 'Icda',
    'preInspections'=>[
      [
        "name"=>"Motocicleta sucia",
        "type"=>"boolean",
        "values"=>null
      ],
      [
        "name"=>"Descargado",
        "type"=>"boolean",
        "values"=>null
      ],
      [
        "name"=> "Fallos encontrados",
        "type"=> "select",
        "values"=> [
            "1",
            "2"
        ]
      ]
    ],
    'tecmas_pruebas'=>[
      ["id"=>1,"prueba"=>0],
      ["id"=>3,"prueba"=>0],
      ["id"=>4,"prueba"=>0],
      ["id"=>5,"prueba"=>1],
      ["id"=>5,"prueba"=>0],
      ["id"=>7,"prueba"=>0],
      ["id"=>8,"prueba"=>0]
    ],
    'tecmas_user'=>38
];
