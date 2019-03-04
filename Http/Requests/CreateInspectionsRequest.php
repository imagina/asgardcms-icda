<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateInspectionsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inspections_types_id'=>'required|exists:icda__inspections_types,id',
          'vehicles_id'=>'required|exists:icda__vehicles,id',
          'teaching_vehicle'=>'required|boolean',
          'mileage'=>'required|numeric',
          'exhosto_diameter'=>'numeric',
          'engine_cylinders'=>'numeric',
          'axes'=>'required|array',
          'pre_inspections'=>'required|array',
          'items'=>'required|array'
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
