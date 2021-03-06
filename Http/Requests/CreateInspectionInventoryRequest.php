<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateInspectionInventoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'inventory_id'=>'required|exists:icda__inventories,id',
          'quantity'=>'required|numeric',
          'evaluation'=>'required|in:B,R,M,NA',

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
