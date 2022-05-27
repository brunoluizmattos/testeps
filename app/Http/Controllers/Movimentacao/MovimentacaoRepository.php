<?php

namespace App\Http\Controllers\Movimentacao;

use App\Models\Conteiner\Conteiner;
use App\Models\Movimentacao\Movimentacao;
use App\Repository\BaseRepository;

class MovimentacaoRepository extends BaseRepository{

    public function __construct() {
        $this->model = new Movimentacao();
    }

    /**
     * @param MovimentacaoBuilder $builder
     * @return mixed|null
     */
    public function gravarMovimentacao(MovimentacaoBuilder $builder)
    {
        $this->model->id_conteiner      = $builder->getConteiner();
        $this->model->id_tipo           = $builder->getTipo();
        $this->model->data_inicio       = $builder->getDataInicio();
        $this->model->data_fim          = $builder->getDataFim();

        if ($this->create()) {
            return $this->model;
        }

        return false;
    }

    /**
     * @param $id
     * @param MovimentacaoBuilder $builder
     * @return mixed|null
     */
    public function atualizar($id, MovimentacaoBuilder $builder)
    {
        if (empty($this->model = $this->findById($id))) {
            throw new \Exception('Movimentação não encontrada');
        }

        $this->model->id_conteiner      = $builder->getConteiner();
        $this->model->id_tipo           = $builder->getTipo();
        $this->model->data_inicio       = $builder->getDataInicio();
        $this->model->data_fim          = $builder->getDataFim();

        if ($this->update()) {
            return $this->model;
        }

        return false;
    }
}



