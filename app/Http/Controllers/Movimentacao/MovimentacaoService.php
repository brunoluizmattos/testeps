<?php

namespace App\Http\Controllers\Movimentacao;

class MovimentacaoService
{
    /**
     * @var MovimentacaoRepository
     */
    private $movimentacaoRepository;

    public function __construct()
    {
        $this->movimentacaoRepository = new MovimentacaoRepository();
    }

    /**
     *
     * @return mixed|null
     *@var MovimentacaoBuilder $movimentacaoBuilder
     */
    public function salvar(MovimentacaoBuilder $movimentacaoBuilder)
    {
        return $this->movimentacaoRepository->gravarMovimentacao($movimentacaoBuilder);
    }

    /**
     *
     * @var int $id
     * @var MovimentacaoBuilder $movimentacaoBuilder
     *
     * @return mixed|null
     */
    public function alterar(int $id, MovimentacaoBuilder $movimentacaoBuilder) {

        return $this->movimentacaoRepository->atualizar($id, $movimentacaoBuilder);
    }

    /**
     *
     * @var int $id
     *
     * @return mixed|null
     */
    public function obterPorId(int $id) {

        return $this->movimentacaoRepository->findById($id);
    }

    /**
     *
     * @var int $id
     *
     * @return mixed|null
     */
    public function deletar(int $id) {

        return $this->movimentacaoRepository->delete($id);
    }
}
