<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateBackendVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'string',
          'type_vehicle'=>'string',
          'type_fuel'=>'string',
          'brand'=>'max:45',
          'line'=>'max:45',
          'model'=>'max:45',
          'color'=>'max:45',
          'transit_license'=>'max:60',
          'enrollment_date'=>'max:60',
          // 'board'=>'max:15|unique:icda__vehicles,board',
          'chasis_number'=>'max:60',
          'engine_number'=>'max:60',
          'displacement'=>'max:30',
          'axes_number'=>'numeric',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'gas_certificate_expiration'=>'date',
          'user_id'=>'exists:users,id'
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
