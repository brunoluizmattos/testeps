<?php

namespace Database\Seeders;

use App\Models\Cliente\Cliente;
use App\Models\Conteiner\Conteiner;
use App\Models\Movimentacao\Movimentacao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('cliente')->truncate();
        DB::table('conteiner')->truncate();
        DB::table('movimentacao')->truncate();


        $totalCliente = 10;
        //
        $faker = \Faker\Factory::create('pt_BR');

        for ($i = 0; $i < $totalCliente; $i++) {

            $cliente = new Cliente();

            $cliente->nome = $faker->name;

            $cliente->save();
        }

        $this->inserirDadosConteiner();
        $this->inserirDadosMovimentacao();
        Model::reguard();
    }

    public function inserirDadosConteiner()
    {
        $cliente = new Cliente();

        $clientes = $cliente->all();

        foreach ($clientes as $cliente) {

            $conteiner = new Conteiner();

            $conteiner->id_cliente = $cliente->id;
            $conteiner->numero = $this->random_str_generator(4);
            $conteiner->numero .= $this->random_number_generator(7);
            $conteiner->id_tipo = ($cliente->id % 2) ? 1 : 2;
            $conteiner->id_status = rand(1,2);
            $conteiner->id_categoria = rand(1,2);

            $conteiner->save();
        }
    }

    public function inserirDadosMovimentacao()
    {
        $conteiner = new Conteiner();

        $conteiners = $conteiner->all();

        foreach ($conteiners as $conteiner) {

            $quantidadeLoop = 10;

            for ($x=0; $x < $quantidadeLoop; $x++) {

                $movimentacao = new Movimentacao();

                $movimentacao->id_conteiner = $conteiner->id_conteiner;
                $movimentacao->id_tipo = rand(1,7);
                $movimentacao->data_inicio  = \Carbon\Carbon::now();
                $movimentacao->data_fim     = \Carbon\Carbon::now();

                $movimentacao->save();
            }
        }
    }

    // retirado de: https://www.delftstack.com/pt/howto/php/php-generate-random-string/
    public function random_str_generator ($len_of_gen_str){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $var_size = strlen($chars);
        $random_str = '';
        for( $x = 0; $x < $len_of_gen_str; $x++ ) {
            $random_str .= $chars[ rand( 0, $var_size - 1 ) ];
        }

        return $random_str;
    }

    // retirado de: https://www.delftstack.com/pt/howto/php/php-generate-random-string/
    public function random_number_generator ($len_of_gen_number){
        $chars = "0123456789";
        $var_size = strlen($chars);
        $random = '';
        for( $x = 0; $x < $len_of_gen_number; $x++ ) {
            $random .= $chars[ rand( 0, $var_size - 1 ) ];
        }

        return $random;
    }
}
