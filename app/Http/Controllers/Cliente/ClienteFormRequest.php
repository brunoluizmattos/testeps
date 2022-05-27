<?php

namespace App\Http\Controllers\Cliente;

use Dingo\Api\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'         => 'required',
        ];
    }
}
