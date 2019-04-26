<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'numeric',
          'type_vehicle'=>'numeric',
          'type_fuel'=>'numeric',
          'brand_id'=>'exists:icda__brands,id',
          'line_id'=>'exists:icda__lines,id',
          'model'=>'max:45',
          'color_id'=>'exists:icda__colors,id',
          'transit_license'=>'max:60',
          'enrollment_date'=>'date',
          'board'=>'max:15|unique:icda__vehicles,board',
          'vin_number'=>'max:60',
          'chasis_number'=>'max:60',
          'engine_number'=>'max:60',
          'displacement'=>'max:30',
          'axes_number'=>'numeric',
          'user_id'=>'exists:users,id',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'tecnomecanica_expedition'=>'date',
          'tecnomecanica_expiration'=>'date',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
