<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateInventoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'name'=>'string',
          'status'=>'in:0,1',
          
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
