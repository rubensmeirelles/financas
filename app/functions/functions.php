<?php 
include_once "../financas/app/config/config.php";

function buscarReceitas($conn, $table, $tipo){
    $queryReceitas = "SELECT SUM(valor) AS valor FROM $table WHERE tipo = '$tipo'";
    $executeReceitas = mysqli_query($conn, $queryReceitas);
    $resultReceitas = mysqli_fetch_assoc($executeReceitas);
    return $resultReceitas;
}

function buscarDespesas($conn, $table, $tipo){
    $queryDespesas = "SELECT SUM(valor) AS valor FROM $table WHERE tipo = '$tipo'";
    $executeDespesas = mysqli_query($conn, $queryDespesas);
    $resultDespesas = mysqli_fetch_assoc($executeDespesas);
    return $resultDespesas;
}

function calcularSaldo($conn, $table, $tipoReceita, $tipoDespesa) {
    // Busca o total de receitas
    $receitas = buscarReceitas($conn, $table, $tipoReceita);
    $totalReceitas = $receitas['valor'];

    // Busca o total de despesas
    $despesas = buscarDespesas($conn, $table, $tipoDespesa);
    $totalDespesas = $despesas['valor'];

    // Calcula o saldo
    $saldo = $totalReceitas - $totalDespesas;

    return $saldo;
}



