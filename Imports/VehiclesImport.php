<?php

namespace Modules\Icda\Imports;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\Icda\Repositories\VehiclesRepository;
use Modules\Icda\Entities\Vehicles;
// class VehiclesImport implements ToCollection,WithChunkReading,WithHeadingRow
class VehiclesImport implements ToCollection,WithChunkReading,WithHeadingRow,ShouldQueue
{

  private $vehicle;
  private $info;

  public function __construct(
    VehiclesRepository $vehicle,
    $info
  ){
    $this->info=$info;
    $this->vehicle = $vehicle;
  }

  /**
  * Data from Excel
  */
  public function collection(Collection $rows)
  {
    $rows=json_decode(json_encode($rows));
    // dd($rows);
    foreach ($rows as $row)
    {
      try {
        if(isset($row->id)){
          $data=[];
          $vehicle_id=(int)$row->id;
          // $data['id']=$row->id;
          // Search by id
          $vehicle=$this->vehicle->find($vehicle_id);
          if(!$vehicle){
            //Vehicle do not exist, mandatory fields to create it
            // if(!isset($row->service_type))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a service type');
            // if(!isset($row->type_vehicle))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a vehicle type');
            // if(!isset($row->type_fuel))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a fuel type');
            // if(!isset($row->brand))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a brand');
            // if(!isset($row->line))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a line');
            // if(!isset($row->model))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a model');
            // if(!isset($row->color))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a color');
            // if(!isset($row->transit_license))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a transit license');
            // if(!isset($row->enrollment_date))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a enrollment date');
            if(!isset($row->board))
            throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a board');
            // if(!isset($row->numero_placa))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a board');
            // if(!isset($row->chasis_number))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a chasis number');
            // if(!isset($row->engine_number))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a engine number');
            // if(!isset($row->displacement))
            // throw new \Exception('Vehicle with id: '.$vehicle_id.', it is necessary that you have a displacement');

          }//Products not exist
          $vehicleByBoard=$this->vehicle->findByBoard($row->board);
          if($vehicleByBoard){
            if($vehicleByBoard->id!=$vehicle_id)
            throw new \Exception('Warning: There is already a vehicle with this plate other than id: '.$vehicle_id);
          }
          // dd($vehicleByBoard);

          // $data['id']=$vehicle_id;
          $data['id']=$vehicle_id;
          $data['user_id']=$this->info['user_id'];
          if(isset($row->service_type))
            $data['service_type']=$row->service_type;
          if(isset($row->type_vehicle))
            $data['type_vehicle']=$row->type_vehicle;
          if(isset($row->type_fuel))
            $data['type_fuel']=$row->type_fuel;
          if(isset($row->brand))
            $data['brand']=$row->brand;
          if(isset($row->line))
            $data['line']=$row->line;
          if(isset($row->model))
            $data['model']=$row->model;
          if(isset($row->color))
            $data['color']=$row->color;
          if(isset($row->transit_license))
            $data['transit_license']=$row->transit_license;
          if(isset($row->enrollment_date))
            $data['enrollment_date']=$row->enrollment_date;
          if(isset($row->board))
            $data['board']=$row->board;
          if(isset($row->chasis_number))
            $data['chasis_number']=$row->chasis_number;
          if(isset($row->engine_number))
            $data['engine_number']=$row->engine_number;
          if(isset($row->displacement))
            $data['displacement']=$row->displacement;

          if($vehicle){
            //Update
            $this->vehicle->update($vehicle,  $data);
            \Log::info('Update Vehicle with id: '.$vehicle->id.', Board: '.$vehicle->board);
          }else{
            //Create
            $newVehicle = $this->vehicle->create($data);
            $newVehicle->id = $vehicle_id;
            $newVehicle->save();
            \Log::info('Vehicle created with the plate: '.$row->board);
          }
        }//if vehicle id
      } catch (\Exception $e) {
        // dd($e->getMessage());
        \Log::error('Vehicles Import error: '.$e->getMessage());
        //dd($e->getMessage());
      }//catch
    }// foreach
  }//collection rows

  /*
  The most ideal situation (regarding time and memory consumption)
  you will find when combining batch inserts and chunk reading.
  */
  public function batchSize(): int
  {
    return 1000;
  }

  /*
  This will read the spreadsheet in chunks and keep the memory usage under control.
  */
  public function chunkSize(): int
  {
    return 1000;
  }

}
