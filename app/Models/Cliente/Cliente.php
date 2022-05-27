<?php

namespace App\Models\Cliente;


use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public $timestamps = false;

    protected $table = 'cliente';
    protected $primaryKey = 'id';

}
