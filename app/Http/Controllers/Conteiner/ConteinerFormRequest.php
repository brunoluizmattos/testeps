<?php

namespace App\Http\Controllers\Conteiner;

use Dingo\Api\Http\FormRequest;

class ConteinerFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cliente'   => 'required',
            'numero'    => 'required',
            'tipo'      => 'required',
            'status'    => 'required',
            'categoria' => 'required',
        ];
    }
}
