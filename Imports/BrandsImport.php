<?php

namespace Modules\Icda\Imports;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\Icda\Entities\Brands;
// class VehiclesImport implements ToCollection,WithChunkReading,WithHeadingRow
class BrandsImport implements ToCollection,WithChunkReading,WithHeadingRow,ShouldQueue
{


  public function __construct(
  ){
  }

  /**
  * Data from Excel
  */
  public function collection(Collection $rows)
  {
    dd($rows);
    $rows=json_decode(json_encode($rows));
    dd($rows);
    foreach ($rows as $row)
    {
      try {
        if(isset($row->id)){
          $data=[];
          $brand_id=(int)$row->id;
          $brand=Brands::where('id', $row->id)->first();
          if(!$brand){
            if(!isset($row->name))
              throw new \Exception('Brand with id: '.$brand_id.', it is necessary that you have a name');
          }//Brand not exist

          if($brand){
            $brand->name=$row->name;
            $brand->update();
            \Log::info('Update Brand with id: '.$brand->id.', Name: '.$brand->name);
          }else{
            //Create
            $brand=new Brands();
            $brand->name=$row->name;
            $brand->save();
            $brand->id = $brand_id;
            $brand->save();
            \Log::info('Brand created with the name: '.$row->name);
          }
        }//if vehicle id
      } catch (\Exception $e) {
        // dd($e->getMessage());
        \Log::error('Brand Import error: '.$e->getMessage());
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
