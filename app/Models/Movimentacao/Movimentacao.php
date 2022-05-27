<?php

namespace App\Models\Movimentacao;


use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model {

    public $timestamps = false;

    protected $table = 'movimentacao';
    protected $primaryKey = 'id';

    public function conteiner(){
        return $this->hasOne('App\Models\Conteiner\Conteiner', 'id_conteiner', 'id_conteiner');
    }

    public function tipo(){
        return $this->hasOne('App\Models\ConteinerTipo\ConteinerTipo', 'id', 'id_tipo');
    }

}
