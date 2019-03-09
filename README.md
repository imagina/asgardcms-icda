"# asgardcms-icda"
//////////Icda Module

//Type Vehicles (Tipos de vehículos)
(Motocicleta,automóvil,etc..)

Get: http://pruebasim.imaginacolombia.com/api/icda/typesVehicles

//Inspections Types (Tipos de inspecciones):

Get: http://pruebasim.imaginacolombia.com/api/icda/inspectionsTypes
Post: http://pruebasim.imaginacolombia.com/api/icda/inspectionsTypes
--Params:
1) name - String

//Pre-inspections (Pre-Inspecciones) :
Get: http://pruebasim.imaginacolombia.com/api/icda/preInspections
--Structure:
1) name,
2) type (boolean or select),
3) values - Array - R if type is select.

//Vehicles (Vehículos)
Get: http://pruebasim.imaginacolombia.com/api/icda/vehicles
Post: http://pruebasim.imaginacolombia.com/api/icda/vehicles
--Params:
1)service_type - String - Example (Particular)
2)types_vehicles_id (Id of types vehicles table)
3)types_fuels_id (Id of types fuels table)
4)brand - String (max 45 digits) - Example (KIA)
5)line - String (max 45 digits) - Example (SOUL LX)
6)model - String (Max 45 digits) - Example (2012)
7)color - String (Max 45 digits) - Example (Gris)
8)transit_license - String ( Max 60 digits ) - Example (10010522505)
9)enrollment_date - String ( Max 60 digits ) - Example (14/07/2011)
10)board - String (max 15 digits / Unique) - Example (AAA00A)
11)chasis_number - String  (Max 60 digits) - Example (KNAJT811AC7290082)
12) engine_number - String (max 60 digits) - Example (G4FCBH2655)
13) displacement - String ( max 30 digits) - Example (1591)
14)user_id (Id of users table.)
15) axes_number - Not required - Numeric - Example (2)
16)insurance_expidition - Not required - Date.
17)insurance_expiration - Not required - Date.


-Search vehicle by board AAA00A (Buscar vehículo por placa AAA00A):
Get: http://pruebasim.imaginacolombia.com/api/icda/vehicles/AAA00A?filter={"field":"board"}

//Inventory (Inventario)
Get: http://pruebasim.imaginacolombia.com/api/icda/inventory
Post: http://pruebasim.imaginacolombia.com/api/icda/inventory
--Params:
1) name - String - Example: Tablero
2) status - No required - Default: 1 - Boolean - Example: 0 (false)

//Gallery image to inspection
Post:http://pruebasim.imaginacolombia.com/api/icda/inspections/media/upload
--Params:
1)code - Random code to create folder of inspection images
2)file - Image

//Inspections (Inspecciones)
Get: http://pruebasim.imaginacolombia.com/api/icda/inspections
Post: http://pruebasim.imaginacolombia.com/api/icda/inspections
--Params:
1) inspections_types_id - (Id of inspections_types table) - Example id:1.
2) teaching_vehicle - Boolean -  Example: 1 or 0 (true or false).
3) mileage (kilometraje) - Numeric - Example: 32
4) exhosto_diameter (Diametro exhosto, CHECK AND GO) - No requerido - Numeric - example: 500
5) engine_cylinders (Cilindros motor, AUTOGASES) - No requerido - Numeric
6) axes (ejes) - Array - Structure array examples:
Autogases:
[

	[

		{

			"pressure_init": 20,

			"adjustment": 50,
			"type": "L"

		},

                {
			"pressure_init": 99,
			"adjustment": 40,
			"type": "R"
		}

	],

	[

		{

			"pressure_init": 10,
			"adjustment": 32,
			"type": "L"

                },

		{

			"pressure_init": 32,

			"adjustment": 50,

			"type": "R"

		}

	]

]
CheckAndGo (2 axes - 2 ejes):
[

	[

		{

			"pressure_init": 20,

			"adjustment": 50,
			"type": "L"

		}

	],

	[

		{

			"pressure_init": 10,

			"adjustment": 32,
			"type": "R"

                }                        
	]

]
7)pre_inspections - Array - Structure array example:
[

	name:"Motocicleta sucia",
	value:1

],
[
	name:"Descargado",
	value:0
]
8)items - Array - Structure array example:
[
	inventory_id:1,
	evaluation:"R",
	quantity:40
],
[
	inventory_id:2,
	evaluation:"B",
	quantity:40
]
10)gas_certificate - Not required - String.
11)gas_certifier - Not required - String.
12)gas_certificate_expiration - Not Required - Date.
13)governor - Not required - boolean.
14)taximeter - Not required - boolean.
15)polarized_glasses - Not required - boolean.
16)armored_vehicle - Not required - boolean.
17)modified_engine - Not required - boolean.
18)spare_tires - Not Required - Numeric - Example: 3
19)observations - Not required - String.
20)vehicle_prepared - Boolean.
21)seen_technical_director - Not Required - Boolean.
22)vehicle_delivery_signature - String - Example: image base:64..
23)signature_received_report - Not required- String - Example: image base:64...
24)type_vehicle - Example: (MOTOCICLETA)
25)code - Not Required. //If receive this code, it will rename the image gallery folder of the inspection that was created with this code, by the inspection id.
