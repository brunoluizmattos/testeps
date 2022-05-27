<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente\Cliente;
use League\Fractal\TransformerAbstract;

class ClienteResponseTransformers extends TransformerAbstract {

    public function transform(Cliente $cliente)
    {
        return [
            "nome" => $cliente->nome
        ];
    }
}
