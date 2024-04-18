<?php
require_once '../financas/app/functions/functions.php';
//TOTAL DE RECEITAS
$table = 'lancamentos';
$tipo = "Receita";
$receitas = buscarReceitasDespesas($conn, $table, $tipo);

//TOTAL DE DESPESDAS
$table = 'lancamentos';
$tipo = "Despesa";
$despesas = buscarReceitasDespesas($conn, $table, $tipo);

//SALDO
$saldo = calcularSaldo($conn, 'lancamentos', 'Receita', 'Despesa');

//TOTAL DE LANÇAMENTOS
$table = 'lancamentos';
$where = 1;
$order = "id DESC";
$lancamentos = buscarLancamentos($conn, $table, $where, $order);

?>
<div class="content p-2 left-250">
    <div class="content-main">
        <div class="d-flex align-items-center shadow-lg main-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                <path d="M14 9h8v6h-8z"></path>
                <path d="M20 3H5C3.346 3 2 4.346 2 6v12c0 1.654 1.346 3 3 3h15c1.103 0 2-.897 2-2v-2h-8c-1.103 0-2-.897-2-2V9c0-1.103.897-2 2-2h8V5c0-1.103-.897-2-2-2z"></path>
            </svg>
            <span class="text-orange px-1">Lançamentos</h3>
        </div>

        <!-- Lançamentos -->

        <div class="d-flex justify-content-around align-items-center mt-3">
            <div>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#lancamentoModal">Novo Lançamento</button>
            </div>

            <div class="card shadow d-flex credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-light bg-success">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <span>Receitas</span>
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($receitas['valor'], 2, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            <div class="card shadow d-flex credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-light bg-danger">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <span>Despesas</span>
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($despesas['valor'], 2, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            <div class="card shadow d-flex credit-card">
                <div class="card-body d-flex justify-content-around align-items-center text-light bg-info">
                    <div class="d-flex justify-content-center align-items-center flex-column p-2 icon-card">
                        <span>Saldo</span>
                        <span class="fs-5 fw-bolder mt-3">R$ <?php echo number_format($saldo, 2, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="mt-5 p-3">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#lancamentoModal">Novo Lançamento</button>
        </div> -->

        <div class="p-3" style="width:450px">
            <?php
            session_start();
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>

        <div class="p-3">
            <?php
            $msg = "";
            ?>

            <table id="tabelaLancamentos" class="display table table-dark table-striped table-hover text-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Data Lançamento</th>
                        <th scope="col">Data Vencimento</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Parcela</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($lancamentos as $result) : ?>
                        <?php extract($result); ?>
                        <tr>
                            <td scope='row'><?php echo $id; ?></td>
                            <td scope='row'><?php echo $tipo; ?></td>
                            <td scope='row'><?php echo $conta; ?></td>
                            <td scope='row'><?php echo date("d/m/Y", strtotime($data_lancamento)); ?></td>
                            <td scope='row'><?php echo date("d/m/Y", strtotime($data_vencimento)); ?></td>
                            <td scope='row'>R$ <?php echo number_format($valor, 2, ',', '.'); ?></td>
                            <td scope='row'><?php echo $descricao; ?></td>
                            <td scope='row'><?php echo $categoria; ?></td>
                            <td scope='row'><?php echo $parcelas; ?></td>
                            <td>
                                <button type='button' class='btn btn-primary'>Editar</button>
                                <button type='button' class='btn btn-danger'>Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <?php echo "<li>$parcelamento</li>"; ?> -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lancamentoModal" tabindex="-1" aria-labelledby="lancamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lancamentoModalLabel">Meus lançamentos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CADASTRA NO BANCO DE DADOS -->
                <?php
                //RECEBER OS DADOS DO FORMULÁRIO

                $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if (!empty($data['salvarLancamento'])) {
                    // EVITAR SQL INJECTION
                    $tipo = mysqli_real_escape_string($conn, $data['tipo']);
                    $conta = mysqli_real_escape_string($conn, $data['conta']);
                    $data_lancamento = mysqli_real_escape_string($conn, $data['data_lancamento']);
                    $valor = mysqli_real_escape_string($conn, $data['valor']);
                    $descricao = mysqli_real_escape_string($conn, $data['descricao']);
                    $categoria = mysqli_real_escape_string($conn, $data['categoria']);
                    $opcao_lancamento = mysqli_real_escape_string($conn, $data['opcao_lancamento']);
                    $parcelas = mysqli_real_escape_string($conn, $data['parcelas']);

                    $valor_parcela = $valor / $parcelas;
                    $valor_ultima_parcela = $valor - ($valor_parcela * ($parcelas - 1));

                    $data_vencimento = new DateTime($data_lancamento); // Inicializa a data de vencimento com a data de lançamento
                    $controle = 0;

                    for ($i = 1; $i <= $parcelas; $i++) {
                        // Adiciona 1 mês à data de vencimento
                        $data_vencimento->add(new DateInterval("P1M"));

                        $controle++;
                        if ($controle == $parcelas) {
                            $valor_final_parcela = $valor_ultima_parcela;
                        } else {
                            $valor_final_parcela = $valor_parcela;
                        }

                        // Formata a data de vencimento para o formato adequado
                        $data_vencimento_formatada = $data_vencimento->format('Y-m-d');

                        // Monta e executa a query SQL para inserir o lançamento
                        $parcelamento = "$i/$parcelas";
                        $queryLancamento = "INSERT INTO lancamentos (tipo, conta, data_lancamento, data_vencimento, valor, descricao, categoria, opcao_lancamento, parcelas) VALUES ('$tipo', '$conta', '$data_lancamento', '$data_vencimento_formatada', $valor_final_parcela, '$descricao', '$categoria', '$opcao_lancamento', '$parcelamento')";
                        mysqli_query($conn, $queryLancamento);
                    }



                    if (mysqli_insert_id($conn)) {
                        $_SESSION['msg'] = "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show' role='alert'>
                            Cadastro realizado com sucesso!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        $url_redirect = URL . "/lancamentos";
                        header("Location: $url_redirect");
                    } else {
                        $_SESSION['msg'] = "<div class='alert alert-danger d-flex align-items-center alert-dismissible fade show' role='alert'>
                            Erro ao cadastrar :(
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        $url_redirect = URL . "/lancamentos";
                        header("Location: $url_redirect");
                    }
                }
                ?>
                <?php
                //BUSCAR O TIPO NO BANCO DE DADOS
                $tipoLancamento = "SELECT * FROM tipos";
                $resultTipos = mysqli_query($conn, $tipoLancamento);
                if (($resultTipos) and ($resultTipos->num_rows != 0)) {
                ?>

                    <form class="row g-3" method="POST" action="">
                        <div class="col-md-3">
                            <label for="tipo" class="form-label">Tipo lançamento</label>
                            <select id="tipo" class="form-select" name="tipo">
                                <option selected>Selecione o tipo...</option>
                                <?php foreach ($resultTipos as $res) : ?>
                                    <?php extract($res); ?>
                                    <option value="<?= $tipo; ?>"><?= $tipo; ?></option>
                                <?php endforeach; ?>
                            <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="conta" class="form-label">Conta</label>
                            <select id="conta" class="form-select" name="conta">
                                <option selected>Selecione a conta...</option>
                                <option value="Banco do Brasil">Banco do Brasil</option>
                                <option value="Nubank">Nubank</option>
                                <option value="Porto Seguro">Porto Seguro</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="data_lancamento" class="form-label">Data da compra</label>
                            <input type="date" class="form-control" id="data_lancamento" name="data_lancamento">
                        </div>
                        <div class="col-md-2">
                            <label for="data_vencimento" class="form-label">Data do vencimento</label>
                            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento">
                        </div>
                        <div class="col-md-2">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="valor" placeholder="Valor" name="valor">
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcao_lancamento" id="debito" value="D">
                                <label class="form-check-label" for="debito">
                                    Débito
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcao_lancamento" id="gridCheck" value="C">
                                <label class="form-check-label" for="gridCheck">
                                    Crédito
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 hidden parcelas">
                            <label for="parcelas" class="form-label">Quantidade de parcelas</label>
                            <input type="text" class="form-control" id="parcelas" placeholder="Quantidade de parcelas" name="parcelas" value="1/1">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="descricao" class="form-label">Descrição do lançamento</label>
                                <input type="text" class="form-control" id="descricao" placeholder="Descrição do lançamento" name="descricao">
                            </div>
                            <div class="col-md-4">
                                <?php
                                //BUSCAR AS CATEGORIAS NO BANCO DE DADOS
                                $categorias = "SELECT * FROM categorias";
                                $resultcategorias = mysqli_query($conn, $categorias);
                                if (($resultcategorias) and ($resultcategorias->num_rows != 0)) {
                                ?>
                                    <label for="categoria" class="form-label">Categoria</label>
                                    <select id="categoria" class="form-select" name="categoria">
                                        <option selected value="0">Selecione a categoria...</option>
                                        <?php foreach ($resultcategorias as $c) : ?>
                                            <?php extract($c); ?>
                                            <option value="<?= $nome_categoria; ?>"><?= $nome_categoria; ?></option>
                                        <?php endforeach; ?>
                                    <?php }; ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-primary" name="salvarLancamento" value="Salvar">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>