<?php

namespace App\Http\Controllers\Conteiner;

use App\Models\Conteiner\Conteiner;
use App\Repository\BaseRepository;

class ConteinerRepository extends BaseRepository{

    public function __construct() {
        $this->model = new Conteiner();
    }

    /**
     * @param ConteinerBuilder $builder
     * @return mixed|null
     */
    public function gravarConteiner(ConteinerBuilder $builder)
    {
        $this->model->id_cliente   = $builder->getCliente();
        $this->model->numero    = $builder->getNumero();
        $this->model->id_tipo      = $builder->getTipo();
        $this->model->id_status    = $builder->getStatus();
        $this->model->id_categoria = $builder->getCategoria();

        if ($this->create()) {
            return $this->model;
        }

        return false;
    }

    /**
     * @param $id
     * @param ConteinerBuilder $builder
     * @return mixed|null
     */
    public function atualizar($id, ConteinerBuilder $builder)
    {
        if (empty($this->model = $this->findById($id))) {
            throw new \Exception('Conteiner não encontrado');
        }

        $this->model->cliente   = $builder->getCliente();
        $this->model->numero    = $builder->getNumero();
        $this->model->tipo      = $builder->getTipo();
        $this->model->status    = $builder->getStatus();
        $this->model->categoria = $builder->getCategoria();

        if ($this->update()) {
            return $this->model;
        }

        return false;
    }
}



