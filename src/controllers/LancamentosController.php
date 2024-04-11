<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Lancamento;
use \src\models\Categoria;
use \src\models\Tipo;

class LancamentosController extends Controller {

    public function index() {
        $tipos = Tipo::select()->execute();
        $categorias = Categoria::select()->execute();
        $lancamentos = Lancamento::select()->get();

        $this->render('lancamentos', [
            'tipos' => $tipos,
            'categorias' => $categorias,
            'lancamentos' => $lancamentos
        ]);       
    }

    public function novo() {
        $tipo = filter_input(INPUT_POST, 'tipo');
        $conta = filter_input(INPUT_POST, 'conta');
        $data_lancamento = filter_input(INPUT_POST, 'data_lancamento');
        $data_vencimento = filter_input(INPUT_POST, 'data_vencimento');
        $valor = filter_input(INPUT_POST, 'valor');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $categoria = filter_input(INPUT_POST, 'categoria');
        $parcelas = filter_input(INPUT_POST, 'parcelas');        

        if($tipo) {
            Lancamento::insert([
                'tipo' => $tipo,
                'conta' => $conta,
                'data_lancamento' => $data_lancamento,
                'data_vencimento' => $data_vencimento,
                'valor' => $valor,
                'descricao' => $descricao,
                'categoria' => $categoria,
                'parcelas' => $parcelas,

                
            ])->execute();
            
            $this->redirect('/lancamentos');
            exit;
        }
        echo 'erro';
    }
}