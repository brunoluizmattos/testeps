<?php

namespace App\Http\Controllers\Cliente;

use App\Repository\BaseRepository;
use App\Models\Cliente\Cliente;

class ClienteRepository extends BaseRepository{

    public function __construct() {
        $this->model = new Cliente();
    }

    /**
     * @param ConteinerBuilder $builder
     * @return mixed|null
     */
    public function gravarCliente(ConteinerBuilder $builder)
    {
        $this->model->nome         = $builder->getNome();

        if ($this->create()) {
            return $this->model;
        }

        return false;
    }

 }



