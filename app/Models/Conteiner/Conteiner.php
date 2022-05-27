<?php

namespace App\Models\Conteiner;


use Illuminate\Database\Eloquent\Model;

class Conteiner extends Model {

    public $timestamps = false;

    protected $table = 'conteiner';
    protected $primaryKey = 'id_conteiner';

    public function cliente(){
        return $this->hasOne('App\Models\Cliente\Cliente', 'id', 'id_cliente');
    }

    public function tipo(){
        return $this->hasOne('App\Models\ConteinerTipo\ConteinerTipo', 'id', 'id_tipo');
    }

    public function status(){
        return $this->hasOne('App\Models\ConteinerStatus\ConteinerStatus', 'id', 'id_status');
    }

    public function categoria(){
        return $this->hasOne('App\Models\ConteinerCategoria\ConteinerCategoria', 'id', 'id_categoria');
    }

}
