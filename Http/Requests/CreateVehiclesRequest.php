<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'required',
          'type_vehicle'=>'required|string',
          'type_fuel'=>'required|string',
          'brand'=>'required|max:45',
          'line'=>'required|max:45',
          'model'=>'required|max:45',
          'color'=>'required|max:45',
          'transit_license'=>'required|max:60',
          'enrollment_date'=>'required|max:60',
          'board'=>'required|max:15|unique:icda__vehicles,board',
          'chasis_number'=>'required|max:60',
          'engine_number'=>'required|max:60',
          'displacement'=>'required|max:30',
          'axes_number'=>'numeric',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'user_id'=>'required|exists:users,id'
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
