<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateVehiclesRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'service_type'=>'required|numeric',
          'type_vehicle'=>'required|integer',
          'type_fuel'=>'required|integer',
          'brand_id'=>'required|exists:icda__brands,id',
          'line_id'=>'required|exists:icda__lines,id',
          'model'=>'required|max:45',
          'color_id'=>'required|exists:icda__colors,id',
          'transit_license'=>'required|max:60',
          'enrollment_date'=>'required|date',
          'board'=>'required|max:15|unique:icda__vehicles,board',
          'chasis_number'=>'required|max:60',
          'vin_number'=>'required|max:60',
          'engine_number'=>'required|max:60',
          'displacement'=>'required|max:30',
          'axes_number'=>'numeric',
          'user_id'=>'required|exists:users,id',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'tecnomecanica_expiration'=>'date',
          'tecnomecanica_expedition'=>'date',
          'tecnomecanica_code'=>'max:50',
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
