<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateBackendVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'numeric',
          'type_vehicle'=>'numeric',
          'type_fuel'=>'numeric',
          'brand'=>'max:45|exists:icda__brands,id',
          'line_id'=>'max:45|exists:icda__lines,id',
          'model'=>'max:45',
          'color'=>'max:45|exists:icda__colors,id',
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
