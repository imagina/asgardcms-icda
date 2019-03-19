<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateInspectionInventoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inspection_inventory_id'=>'required|exists:icda__inspectioninventories,id',
          'quantity'=>'numeric',
          'evaluation'=>'in:B,R,M',
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
