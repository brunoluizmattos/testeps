<?php

namespace App\Http\Controllers\Conteiner;

use App\Models\Conteiner\Conteiner;
use League\Fractal\TransformerAbstract;

class ConteinerResponseTransformers extends TransformerAbstract {

    public function transform(Conteiner $conteiner)
    {
        return [
            'id' => $conteiner->id_conteiner,
            'numero' => $conteiner->numero,
            'tipo' => $conteiner->tipo->descricao,
            'status' => $conteiner->status->descricao,
            'categoria' => $conteiner->categoria->descricao,
            'cliente' => [
                'id' => $conteiner->cliente->id,
                'nome'=> $conteiner->cliente->nome,
            ]
        ];
    }
}
