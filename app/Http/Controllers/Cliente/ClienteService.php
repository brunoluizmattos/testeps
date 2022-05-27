<?php

namespace App\Http\Controllers\Cliente;

class ClienteService
{
    /**
     * @var ClienteRepository
     */
    private $clienteRepository;

    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository();
    }

    /**
     *
     * @return mixed|null
     *@var ConteinerBuilder $ClienteBuilder
     */
    public function salvar(ConteinerBuilder $autorBuilder)
    {
        return $this->clienteRepository->gravarCliente($autorBuilder);
    }

    /**
     *
     * @var int $idAutor
     * @var AutorBuilder $AutorBuilder
     *
     * @return mixed|null
     */
    public function alterarAutor(int $idAutor, AutorBuilder $autorBuilder)
    {
        return $this->AutorRepository->atualizar($idAutor, $autorBuilder);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @var string|int $id
     *
     */
    public function getAutor($id)
    {
        if (is_numeric($id)) {
            return $this->AutorRepository->findByID($id);
        }

        if (is_string($id)) {
            return $this->AutorRepository->findBySlug($id);
        }

        throw new \Exception("Erro ao localizar registro");
    }

    /**
     * @param array $data
     * @return \App\Core\Repository\EloquentCollection|\App\Core\Repository\Paginator
     *
     */
    public function getAutores(array $data)
    {
        return $this->AutorRepository->pesquisar($data);
    }

    /**
     *
     *
     * @param int $idAutor
     *
     * @return mixed|null
     */
    public function excluirAutor(int $idAutor) {

        $AutorBuilder = new AutorBuilder();

        $this->AutorValidador = new AutorValidador($AutorBuilder, $idAutor);

        $this->AutorValidador->validarExclusao();

        return $this->AutorRepository->excluir($idAutor);

    }


}
