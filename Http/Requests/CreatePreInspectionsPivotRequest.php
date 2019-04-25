<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePreInspectionsPivotRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'pre_inspection_id'=>'required|exists:icda__pre_inspections,id',
          'value'=>'required'
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
