<?php

namespace App\Http\Controllers\Movimentacao;

class MovimentacaoBuilder
{
    private $id;
    private $conteiner;
    private $tipo;
    private $data_inicio;
    private $data_fim;

    public function Builder($request) {

        $this->conteiner    = $request->conteiner;
        $this->tipo         = $request->tipo;
        $this->data_inicio  = $request->dataInicio;
        $this->data_fim     = $request->dataFim;

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
    public function getConteiner()
    {
        return $this->conteiner;
    }

    /**
     * @param mixed $conteiner
     */
    public function setConteiner($conteiner): void
    {
        $this->conteiner = $conteiner;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    /**
     * @param mixed $data_inicio
     */
    public function setDataInicio($data_inicio): void
    {
        $this->data_inicio = $data_inicio;
    }

    /**
     * @return mixed
     */
    public function getDataFim()
    {
        return $this->data_fim;
    }

    /**
     * @param mixed $data_fim
     */
    public function setDataFim($data_fim): void
    {
        $this->data_fim = $data_fim;
    }

}
