<?php 
include_once '../financas2/includes/header.php';
include_once '../financas2/config/config.php';
include_once '../financas2/config/connection.php';
require_once '../financas2/functions/functions.php';

    $table = 'lancamentos';
    $tipo = "Receita";
    $receitas = buscarReceitasDespesas($conn, $table, $tipo);

    $table = 'lancamentos';
    $tipo = "Despesa";
    $despesas = buscarReceitasDespesas($conn, $table, $tipo);

    $saldo = calcularSaldo($conn, 'lancamentos', 'Receita', 'Despesa');
    
?>

<div class="content p-2 left-250">
    <div class="content-main">
        <div class="d-flex align-items-center shadow-lg main-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path>
            </svg>
            <span class="text-orange px-1">Dashboard</h3>
        </div>

        <?php
            //TOTL DE RECEITAS
            // $listarReceitas = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Receita' LIMIT 1";
            // $resultListarReceitas = mysqli_query($conn, $listarReceitas);
            // $totalReceitas = mysqli_fetch_assoc($resultListarReceitas);
            // extract($totalReceitas);
    
            //TOTL DE DESPESAS
            // $listarDespesas = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' LIMIT 1";
            // $resultListarDespesas = mysqli_query($conn, $listarDespesas);
            // $totalDespesas = mysqli_fetch_assoc($resultListarDespesas);
            // extract($totalDespesas);
    
            //DESPESAS CARTÃO BB
            $listarDespesasBB = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Banco do Brasil' AND opcao_lancamento = 'C' LIMIT 1";
            $resultListarDespesas = mysqli_query($conn, $listarDespesasBB);
            $totalDespesasBB = mysqli_fetch_assoc($resultListarDespesas);
            extract($totalDespesasBB);
    
            //DESPESAS CARTÃO NUBANK
            $listarDespesasNB = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Nubank' AND opcao_lancamento = 'C' LIMIT 1";
            $resultListarDespesas = mysqli_query($conn, $listarDespesasNB);
            $totalDespesasNB = mysqli_fetch_assoc($resultListarDespesas);
            extract($totalDespesasNB);
    
            //DESPESAS CARTÃO PORTO
            $listarDespesasPS = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Porto Seguro' AND opcao_lancamento = 'C' LIMIT 1";
            $resultListarDespesas = mysqli_query($conn, $listarDespesasPS);
            $totalDespesasPS = mysqli_fetch_assoc($resultListarDespesas);
            extract($totalDespesasPS);
    
            //SALDO
            // $saldo = ($totalReceitas['valor'] - $totalDespesas['valor']);
        ;?>
    
        <div class="d-flex p-2">
            <div>
                <table class="table table-dark border" style="width: 500px">
                    <thead>
                        <tr><span class="fw-bold">Resumo Geral (Despesas e Receitas)</span></tr>                
                    </thead>
                    <tr>
                        <td class="text-success">Receitas</td>
                        <td class="text-success border-end">
                            R$ <?php echo number_format($receitas['valor'], 2, ',', '.');?>
                        </td>
                        <td rowspan="2" style="vertical-align : middle;text-align:center;" class="text-info">Saldo</td>
                        <td rowspan="2" style="vertical-align : middle;text-align:center;" class="text-info">
                            R$ <?php echo number_format($saldo, 2, ',', '.');?>
                        </td>
                    </tr>
                    <tr>                
                        <td class="text-danger">Despesas</td>
                        <td class="text-danger border-end">R$ <?php echo number_format($despesas['valor'], 2, ',', '.');?></td>
                    </tr>            
                </table>
            </div>
            <div class="mx-2">
                <span class="fw-bold">Filtros</span>
            </div>
            <hr>
        </div>
        <hr>
        <span class="fw-bold p-2">Gastos com cartão de crédito</span>
    
        <div class="d-flex justify-content-around align-items-center mt-2">
            <div class="card shadow d-flex credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-black bb">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <img src="assets/images/card-bb.png" alt="">
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasBB['valor'], 2, ',', '.');?></span>
                    </div>
                </div>
            </div>
            <div class="card shadow credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-white nu">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <img src="assets/images/card-nub.png" alt="">
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasNB['valor'], 2, ',', '.');?></span>
                    </div>
                </div>
            </div>
            <div class="card shadow credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-white po">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <img src="assets/images/card-porto.png" alt="">
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasPS['valor'], 2, ',', '.');?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../financas2/includes/footer.php';