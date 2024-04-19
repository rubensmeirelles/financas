<?php 
include_once "../financas/app/config/config.php";

function buscarLancamentos($conn, $table, $where = "", $order = ""){
    if (!empty($order)) {
        $order = "ORDER BY $order";
    }
    if (!empty($where)) {
        $where = $where;
    }
    $queryLancamentos = "SELECT * FROM $table WHERE $where $order";
    $executeLancamentos = mysqli_query($conn, $queryLancamentos);
    $resultLancamentos = mysqli_fetch_all($executeLancamentos, MYSQLI_ASSOC);
    return $resultLancamentos;
}

function buscarReceitasDespesas($conn, $table, $tipo){
    $queryReceitas = "SELECT SUM(valor) AS valor FROM $table WHERE tipo = '$tipo'";
    $executeReceitas = mysqli_query($conn, $queryReceitas);
    $resultReceitas = mysqli_fetch_assoc($executeReceitas);
    return $resultReceitas;
}

function calcularSaldo($conn, $table, $tipoReceita, $tipoDespesa) {
    // Busca o total de receitas
    $receitas = buscarReceitasDespesas($conn, $table, $tipoReceita);
    $totalReceitas = $receitas['valor'];

    // Busca o total de despesas
    $despesas = buscarReceitasDespesas($conn, $table, $tipoDespesa);
    $totalDespesas = $despesas['valor'];

    // Calcula o saldo
    $saldo = $totalReceitas - $totalDespesas;

    return $saldo;
}

function deletar($conn, $table, $id){
    if (!empty($id)) {
        $query = "DELETE FROM $table WHERE id =". (int) $id;
        $execute = mysqli_query($conn, $query);
    }
}



