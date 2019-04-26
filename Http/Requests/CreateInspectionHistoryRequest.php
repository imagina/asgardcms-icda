<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateInspectionHistoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inspections_id'=>'required|exists:icda__inspections,id',
          'comment'=>'nullable',
          'status'=>'required'

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
