<?php

namespace App\Http\Controllers\Cliente;

class ClienteBuilder
{
    private $id;
    private $nome;

    public function Builder($request) {

        $this->id             = $request->id;
        $this->nome           = $request->nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }


}
