<?php

use Illuminate\Database\Eloquent\Collection;
use Modules\Icda\Entities\Inspections;
use Modules\Icda\Entities\Order_History;
use Modules\Icda\Entities\InspectionStatus;
use Modules\Icda\Entities\TypesVehicles;
use Modules\Icda\Entities\TypesFuel;
use Modules\Icda\Entities\TypeService;

/**
 * Get Types Services
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icda_get_TypeService')) {

    function icda_get_TypeService()
    {
        $TypeService = new TypeService();
        return $TypeService;
    }
}
/**
 * Get Type Vehicles
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icda_get_TypeVehicle')) {

    function icda_get_TypeVehicle()
    {
        $typeVehicle = new TypesVehicles();
        return $typeVehicle;
    }
}
/**
 * Get Type Vehicles
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icda_get_TypeFuel')) {

    function icda_get_TypeFuel()
    {
        $typeFuel = new TypesFuel();
        return $typeFuel;
    }
}
/**
 * Get Inspection Status Enabled / Disabled
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icda_get_Inspectionstatus')) {

    function icda_get_Inspectionstatus()
    {
        $status = new InspectionStatus();
        return $status;
    }
}

/**
 * Save Image base 64 in server
 *
 * @param  none
 * @return Array $status
 */
if (!function_exists('icda_saveImage')) {

  function icda_saveImage($value, $destination_path, $disk='publicmedia', $size = array(), $watermark = array())
  {

    $default_size = [
      'imagesize' => [
        'width' => 1024,
        'height' => 768,
        'quality'=>80
      ]
    ];
    $size = json_decode(json_encode(array_merge($default_size, $size)));
    //Defined return.
    if (ends_with($value, '.png')) {
      return $value;
    }

    // if a base64 was sent, store it in the db
    if (starts_with($value, 'data:image')) {
      // 0. Make the image
      $image = \Image::make($value);
      // resize and prevent possible upsizing

      $image->resize($size->imagesize->width, $size->imagesize->height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      // 2. Store the image on disk.
      \Storage::disk($disk)->put($destination_path, $image->stream('png', $size->imagesize->quality));

      // 3. Return the path
      return $destination_path;
    }

    // if the image was erased
    if ($value == null) {
      // delete the image from disk
      \Storage::disk($disk)->delete($destination_path);

      // set null in the database column
      return null;
    }


  }
}
