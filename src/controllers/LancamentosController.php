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
        $l->table('lancamentos as l')
            ->select(['l.tipo', 'l.conta', 'l.descricao', 'c.nome_categoria'])
            ->join('categorias as c','c.id', '=', 'l.categoria_id')
            ->get();
        $this->render('lancamentos', [
            'tipos' => $tipos,
            'categorias' => $categorias,
            'lancamentos' => $l
        ]);        
    }

    public function novo() {
        $tipo = filter_input(INPUT_POST, 'tipo');
        $conta = filter_input(INPUT_POST, 'conta');
        $data_lancamento = filter_input(INPUT_POST, 'data_lancamento');
        $data_vencimento = filter_input(INPUT_POST, 'data_vencimento');
        $valor = filter_input(INPUT_POST, 'valor');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $categoria_id = filter_input(INPUT_POST, 'categoria_id');
        $parcelas = filter_input(INPUT_POST, 'parcelas');        

        if($tipo) {
            Lancamento::insert([
                'tipo' => $tipo,
                'conta' => $conta,
                'data_lancamento' => $data_lancamento,
                'data_vencimento' => $data_vencimento,
                'valor' => $valor,
                'descricao' => $descricao,
                'categoria_id' => $categoria_id,
                'parcelas' => $parcelas,

                
            ])->execute();
            
            $this->redirect('/lancamentos');
            exit;
        }
        echo 'erro';
    }
}