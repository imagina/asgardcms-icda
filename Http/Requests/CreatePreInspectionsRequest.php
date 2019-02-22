<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePreInspectionsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          'name'=>'required',
          'type'=>'required|in:boolean,select',
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
