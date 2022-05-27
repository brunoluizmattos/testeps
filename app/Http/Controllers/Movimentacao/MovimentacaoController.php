<?php
namespace App\Http\Controllers\Movimentacao;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class MovimentacaoController extends BaseController
{
    public function  __construct() {
    }

    /**
     *
     * @param Request $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function adicionar(MovimentacaoFormRequest $request)
    {
        $movimentacaoBuilder = (new MovimentacaoBuilder())->Builder($request);
        $movimentacaoService = new MovimentacaoService();

        $movimentacaoService->salvar($movimentacaoBuilder);

        try{
            return $this->response->created();
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    /**
     *
     * @param int $id
     * @param MovimentacaoFormRequest $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function editar(int $id, MovimentacaoFormRequest $request)
    {
        $movimentacaoBuilder = (new MovimentacaoBuilder())->Builder($request);
        $movimentacaoService = new MovimentacaoService();

        try{
            $movimentacaoService->alterar($id, $movimentacaoBuilder);
            return $this->response->created();
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    /**
     *
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function obter(int $id)
    {
        $movimentacaoService = new MovimentacaoService();

        try{
            $movimentacao = $movimentacaoService->obterPorId($id);
            return $this->response->item($movimentacao, new MovimentacaoResponseTransformers());
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    /**
     *
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function excluir(int $id)
    {
        $movimentacaoService = new MovimentacaoService();

        try{
            $movimentacaoService->deletar($id);
            return $this->response->noContent();
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }
}
