<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateInspectionsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inspections_types_id'=>'exists:icda__inspections_types,id',
          'teaching_vehicle'=>'boolean',
          'mileage'=>'required|numeric',
          'exhosto_diameter'=>'numeric',
          'engine_cylinders'=>'numeric',
          'vehicles_id'=>'exists:icda__vehicles,id'
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
