<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdatePreInspectionsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'name'=>'string',
          'type'=>'in:boolean,select',
          'values'=>'string'
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
