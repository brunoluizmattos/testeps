<?php

namespace App\Http\Controllers\Movimentacao;

use Dingo\Api\Http\FormRequest;

class MovimentacaoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'conteiner'     => 'required',
            'dataInicio'    => 'required',
            'dataFim'       => 'required',
            'tipo'          => 'required'
        ];
    }
}
