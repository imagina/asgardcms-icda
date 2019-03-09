<?php

namespace Modules\Icda\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class MediaUploadRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          // 'code'=>'required|numeric',
          'code'=>'required',
          'file'=>'required',
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
