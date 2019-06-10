<?php

namespace Modules\Icda\Imports;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\Icda\Entities\Color;
//class ColorImport implements ToCollection,WithChunkReading,WithHeadingRow,ShouldQueue
class ColorImport implements ToCollection,WithChunkReading,WithHeadingRow
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
          $color_id=(int)$row->id;
          $color=Color::where('id', $row->id)->first();
          if(!$color){
            if(!isset($row->name))
              throw new \Exception('Color with id: '.$color_id.', it is necessary that you have a name');
          }//Brand not exist

          if($color){
            $color->name=$row->name;
            $color->update();
            \Log::info('Update Color with id: '.$color->id.', Name: '.$color->name);
          }else{
            //Create
            $color=new Color();
            $color->name=$row->name;
            $color->save();
            $color->id = $color_id;
            $color->save();
            \Log::info('Color created with the name: '.$row->name);
          }
        }//if vehicle id
      } catch (\Exception $e) {
        // dd($e->getMessage());
        \Log::error('Color Import error: '.$e->getMessage());
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
