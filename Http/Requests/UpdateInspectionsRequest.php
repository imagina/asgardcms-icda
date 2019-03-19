<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateInspectionsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inspections_types_id'=>'exists:icda__inspections_types,id',
          'vehicles_id'=>'exists:icda__vehicles,id',
          'teaching_vehicle'=>'boolean',
          'mileage'=>'numeric',
          'exhosto_diameter'=>'numeric',
          'engine_cylinders'=>'numeric',
          'axes'=>'array',
          'pre_inspections'=>'array',
          'items'=>'array',
          'insurance_expedition'=>'date',
          'insurance_expiration'=>'date',
          'gas_certificate_expiration'=>'date',
          'governor'=>'boolean',
          'taximeter'=>'boolean',
          'polarized_glasses'=>'boolean',
          'armored_vehicle'=>'boolean',
          'modified_engine'=>'boolean',
          'spare_tires'=>'numeric',
          'observations'=>'string',
          'vehicle_prepared'=>'boolean',
          'seen_technical_director'=>'boolean',
          'vehicle_delivery_signature'=>'',
          'signature_received_report'=>'nullable',
          'type_vehicle'=>'string'
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
