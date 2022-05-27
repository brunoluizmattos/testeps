<?php

use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'teste'], function (Router $api) {
        $api->get('', function () {
            return (['teste']);
        });
    });

    $api->group(['prefix' => 'cliente'], function (Router $api) {
        $api->post('',   [\App\Http\Controllers\Cliente\ClienteController::class, 'adicionar']);
    });

    $api->group(['prefix' => 'conteiner'], function (Router $api) {
        $api->post('',   [\App\Http\Controllers\Conteiner\ConteinerController::class, 'adicionar']);
        $api->put('{id}',   [\App\Http\Controllers\Conteiner\ConteinerController::class, 'editar']);
        $api->get('{id}',   [\App\Http\Controllers\Conteiner\ConteinerController::class, 'obter']);
        $api->delete('{id}',   [\App\Http\Controllers\Conteiner\ConteinerController::class, 'excluir']);
    });

    $api->group(['prefix' => 'movimentacao'], function (Router $api) {
        $api->post('',   [\App\Http\Controllers\Movimentacao\MovimentacaoController::class, 'adicionar']);
        $api->put('{id}',   [\App\Http\Controllers\Movimentacao\MovimentacaoController::class, 'editar']);

        $api->get('{id}',   [\App\Http\Controllers\Movimentacao\MovimentacaoController::class, 'obter']);
        $api->delete('{id}',   [\App\Http\Controllers\Movimentacao\MovimentacaoController::class, 'excluir']);
    });

    $api->group(['prefix' => 'relatorio'], function (Router $api) {
        $api->get('',   [\App\Http\Controllers\Relatorio\RelatorioController::class, 'gerar']);
    });

});
