<div class="content left-250">
    <div class="d-flex align-items-center shadow-lg main-header">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
            <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path>
        </svg>
        <span class="text-orange px-1">Dashboard</h3>
    </div>

    <?php
        //DESPESAS CARTÃO BB
        $listarDespesasBB = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Banco do Brasil' LIMIT 1";
        $resultListarDespesas = mysqli_query($conn, $listarDespesasBB);
        $totalDespesasBB = mysqli_fetch_assoc($resultListarDespesas);
        extract($totalDespesasBB);

        //DESPESAS CARTÃO NUBANK
        $listarDespesasNB = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Nubank' LIMIT 1";
        $resultListarDespesas = mysqli_query($conn, $listarDespesasNB);
        $totalDespesasNB = mysqli_fetch_assoc($resultListarDespesas);
        extract($totalDespesasNB);

        //DESPESAS CARTÃO PORTO
        $listarDespesasPS = "SELECT SUM(valor) AS valor FROM lancamentos WHERE tipo = 'Despesa' AND conta = 'Porto Seguro' LIMIT 1";
        $resultListarDespesas = mysqli_query($conn, $listarDespesasPS);
        $totalDespesasPS = mysqli_fetch_assoc($resultListarDespesas);
        extract($totalDespesasPS);
    ;?>

    <h1 class="p-2 fw-bold">Resumo das despesas</h1>
    <hr>

    <div class="d-flex justify-content-around align-items-center mt-5 dashboard">
        <div class="card shadow d-flex credit-card">
            <div class="card-body d-flex justify-content-around align-items-center text-black bb">
                <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                    <img src="app/assets/images/card-bb.png" alt="">
                    <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasBB['valor'], 2, ',', '.');?></span>
                </div>
            </div>
        </div>
        <div class="card shadow credit-card">
            <div class="card-body d-flex justify-content-around align-items-center text-white nu">
                <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                    <img src="app/assets/images/card-nub.png" alt="">
                    <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasNB['valor'], 2, ',', '.');?></span>
                </div>
            </div>
        </div>
        <div class="card shadow credit-card">
            <div class="card-body d-flex justify-content-around align-items-center text-white po">
                <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                    <img src="app/assets/images/card-porto.png" alt="">
                    <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($totalDespesasPS['valor'], 2, ',', '.');?></span>
                </div>
            </div>
        </div>
    </div>
</div>