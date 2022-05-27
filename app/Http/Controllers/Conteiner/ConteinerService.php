<?php

namespace App\Http\Controllers\Conteiner;

class ConteinerService
{
    /**
     * @var ConteinerRepository
     */
    private $conteinerRepository;

    public function __construct()
    {
        $this->conteinerRepository = new ConteinerRepository();
    }

    /**
     *
     * @return mixed|null
     *@var ConteinerBuilder $conteinerBuilder
     */
    public function salvar(ConteinerBuilder $conteinerBuilder)
    {
        return $this->conteinerRepository->gravarConteiner($conteinerBuilder);
    }

    /**
     *
     * @var int $id
     * @var ConteinerBuilder $conteinerBuilder
     *
     * @return mixed|null
     */
    public function alterar(int $id, ConteinerBuilder $conteinerBuilder) {

        return $this->conteinerRepository->atualizar($id, $conteinerBuilder);
    }

    /**
     *
     * @var int $id
     *
     * @return mixed|null
     */
    public function obterPorId(int $id) {

        return $this->conteinerRepository->findById($id);
    }

    /**
     *
     * @var int $id
     *
     * @return mixed|null
     */
    public function deletar(int $id) {

        return $this->conteinerRepository->delete($id);
    }
}
