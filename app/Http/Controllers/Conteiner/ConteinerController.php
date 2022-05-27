<?php
namespace App\Http\Controllers\Conteiner;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ConteinerController extends BaseController
{
    public function  __construct() {
    }

    /**
     *
     * @param Request $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function adicionar(ConteinerFormRequest $request)
    {
        $containerBuilder = (new ConteinerBuilder())->Builder($request);
        $containerService = new ConteinerService();

        $containerService->salvar($containerBuilder);

        try{
            return $this->response->created();
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    /**
     *
     * @param int $id
     * @param ConteinerFormRequest $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function editar(int $id, ConteinerFormRequest $request)
    {
        $containerBuilder = (new ConteinerBuilder())->Builder($request);
        $containerService = new ConteinerService();

        try{
            $containerService->alterar($id, $containerBuilder);
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
        $containerService = new ConteinerService();

        try{
            $conteiner = $containerService->obterPorId($id);
            return $this->response->item($conteiner, new ConteinerResponseTransformers());
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
        $containerService = new ConteinerService();

        try{
            $containerService->deletar($id);
            return $this->response->noContent();
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }
}
