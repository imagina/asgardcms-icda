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
          'items'=>'required|array',
          'gas_certificate_expiration'=>'date',
          'governor'=>'boolean',
          'taximeter'=>'boolean',
          'polarized_glasses'=>'boolean',
          'armored_vehicle'=>'boolean',
          'modified_engine'=>'boolean',
          'spare_tires'=>'numeric',
          'observations'=>'string',
          'vehicle_prepared'=>'required|boolean',
          'seen_technical_director'=>'boolean',
          'vehicle_delivery_signature'=>'required',
          'signature_received_report'=>'nullable',
          'type_vehicle'=>'required|string'

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
