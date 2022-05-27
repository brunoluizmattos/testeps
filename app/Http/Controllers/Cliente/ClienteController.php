<?php
namespace App\Http\Controllers\Cliente;

use App\Core\Upload;
use App\Http\Controllers\Autor\AutorService;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ClienteController extends BaseController
{
    public function  __construct() {
    }

    /**
     *
     * @param Request $request
     *
     * @return \Dingo\Api\Http\Response|void
     */
    public function adicionar(ClienteFormRequest $request)
    {
        $clienteBuilder = (new ConteinerBuilder())->Builder($request);
        $clienteService = new ClienteService();

        $novoCliente = $clienteService->salvar($clienteBuilder);

        try{
            return $this->response->item($novoCliente, new ClienteResponseTransformers())->setStatusCode(201);
        }catch (\Exception $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }
}
