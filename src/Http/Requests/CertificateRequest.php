<?php

namespace elgazar\Certificate\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CertificateRequest extends Request
{
    public function rules(): array
    {
        return [
            'image_url' => ['required', 'string'],
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}