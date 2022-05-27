<?php

namespace App\Models\MovimentacaoTipo;


use Illuminate\Database\Eloquent\Model;

class MovimentacaoTipo extends Model {

    public $timestamps = false;

    protected $table = 'movimentacao_tipo';
    protected $primaryKey = 'id';
}
