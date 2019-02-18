<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'string',
          'types_vehicles_id'=>'exists:icda__types_vehicles,id',
          'types_fuels_id'=>'exists:icda__types_fuels,id',
          'brand'=>'max:45',
          'line'=>'max:45',
          'model'=>'max:45',
          'color'=>'max:45',
          'transit_license'=>'max:60',
          'enrollment_date'=>'max:60',
          'board'=>'max:15|unique:icda__vehicles,board',
          'chasis_number'=>'max:60',
          'engine_number'=>'max:60',
          'displacement'=>'max:30',
          'axes_number'=>'numeric',
          'weight'=>'in:heavy,light',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'gas_certificate_expiration'=>'date'
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
