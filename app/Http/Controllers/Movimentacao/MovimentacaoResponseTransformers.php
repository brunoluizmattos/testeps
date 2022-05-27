<?php

namespace App\Http\Controllers\Movimentacao;

use App\Models\Movimentacao\Movimentacao;
use League\Fractal\TransformerAbstract;

class MovimentacaoResponseTransformers extends TransformerAbstract {

    public function transform(Movimentacao $movimentacao)
    {
        return [
            'id' => $movimentacao->id,
            'dataInicio' => $movimentacao->data_inicio,
            'dateFim' => $movimentacao->data_fim,
            'tipo' => $movimentacao->tipo->descricao,
            'conteiner' => [
                'id' => $movimentacao->conteiner->id_conteiner,
                'numero'=> $movimentacao->conteiner->numero,
            ],
            'cliente' => [
                'id' => $movimentacao->conteiner->cliente->id,
                'nome'=> $movimentacao->conteiner->cliente->nome,
            ]
        ];
    }
}
