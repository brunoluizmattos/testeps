<?php
namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\BaseController;
use http\Env\Response;
use Illuminate\Support\Facades\DB;

class RelatorioController extends BaseController
{
    public function  __construct() {
    }

    public function gerar()
    {
        DB::enableQueryLog(); // Enable query log

        $query = DB::table('movimentacao_tipo')
            ->join('movimentacao', 'movimentacao.id_tipo', '=', 'movimentacao_tipo.id')
            ->join('conteiner', 'conteiner.id_conteiner', '=', 'movimentacao.id_conteiner')
            ->join('conteiner_categoria', 'conteiner_categoria.id', '=', 'conteiner.id_tipo')
            ->join('cliente', 'cliente.id', '=', 'conteiner.id_cliente')
            ->select('cliente.nome as cliente', 'movimentacao_tipo.descricao as descricao_tipo_movimentacao', \DB::raw('count(movimentacao.id_tipo) as total_tipo_movimentacao'),
                'conteiner.id_conteiner', 'conteiner.id_categoria', 'conteiner_categoria.descricao')
            ->groupBy(['cliente.id', 'cliente.nome','movimentacao.id_tipo', 'movimentacao_tipo.descricao', 'conteiner.id_conteiner', 'conteiner_categoria.id', 'conteiner.id_categoria', 'conteiner_categoria.descricao'])
            ->orderBy('cliente.id', 'ASC');

        $registros = $query->get();

        //dd($query->toSql());

        $clienteAtual   = null;
        $conteiner      = null;

        $relatorio = [];

        $totalImportacao = 0;
        $totalExportacao = 0;

        foreach ($registros as $movimentacao) {

            if ($movimentacao->id_conteiner != $conteiner) {

                $conteiner = $movimentacao->id_conteiner;

                if ($movimentacao->id_categoria == 1) {
                    $totalImportacao++;
                } else {
                    $totalExportacao++;
                }
            }

            if ($movimentacao->cliente != $clienteAtual) {
                $clienteAtual = $movimentacao->cliente;
                $relatorio[$clienteAtual]['movimentacoes'] = [];
            }

            array_push($relatorio[$clienteAtual]['movimentacoes'], [
                "tipo" => $movimentacao->descricao_tipo_movimentacao,
                "total" => $movimentacao->total_tipo_movimentacao
            ]);

        }
        $relatorio['totais'] = [
            "importacao" => $totalImportacao,
            "exportacao" => $totalImportacao
        ];

        try{
            return response()->json($relatorio, 403);

        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }
}
