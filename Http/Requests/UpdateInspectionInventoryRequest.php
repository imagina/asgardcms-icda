<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateInspectionInventoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'id'=>'required|exists:icda__inspectioninventories,id',//Id pivot inspection inventory id
          'quantity'=>'numeric',
          'evaluation'=>'in:B,R,M,NA',
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
