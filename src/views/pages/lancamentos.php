<?php $render('header'); ?>

<div class="content left-250">
    <div class="d-flex align-items-center shadow-lg main-header">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
            <path d="M14 9h8v6h-8z"></path>
            <path d="M20 3H5C3.346 3 2 4.346 2 6v12c0 1.654 1.346 3 3 3h15c1.103 0 2-.897 2-2v-2h-8c-1.103 0-2-.897-2-2V9c0-1.103.897-2 2-2h8V5c0-1.103-.897-2-2-2z"></path>
        </svg>
        <span class="text-orange px-1">Lançamentos</h3>
    </div>
    <div class="p-3">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#lancamentoModal">Novo Lançamento</button>
    </div>

    <!-- Lançamentos -->

    <div class="p-3">
        <?php foreach($lancamentos as $l):?>
            <li><?=$l['id']?></li>
        <?php endforeach?>
        <table class="table">
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
                    <th scope="col">Mês Vencimento</th>
                    <th scope="col">Ano Vencimento</th>
                    <th scope="col">Parcela</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
<<<<<<< HEAD
            <?php foreach($lancamentos as $l):?>                
=======
                
>>>>>>> 0ae16716cdb476c972964e6e2e8856807cd52f51
                <tr>
                    <th scope="row"><?=$l['id']?></th>
                    <td><?=$l['tipo']?></td>
                    <td><?=$l['conta']?></td>
                    <td><?=$l['data_lancamento']?></td>
                    <td><?=$l['data_vencimento']?></td>
                    <td><?=$l['valor']?></td>
                    <td><?=$l['descricao']?></td>
                    <td><?=$l['categoria']?></td>
                    <td><?= date("M", strtotime($l['data_vencimento'])) ?></td>
                    <td>2024</td>
                    <td><?=$l['parcelas']?></td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
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
                <form class="row g-3" method="POST" action="<?=$base;?>/novo">
                    <div class="col-md-3">
                        <label for="tipo" class="form-label">Tipo lançamento</label>
                        <select id="tipo" class="form-select" name="tipo">
                            <option selected>Selecione o tipo...</option>
                            <?php foreach ($tipos as $t): ?>
                                <option><?=$t['tipo'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="conta" class="form-label">Cartão</label>
                        <select id="conta" class="form-select" name="conta">
                            <option selected value="0">Selecione o cartão...</option>
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
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="parcelado">
                            <label class="form-check-label" for="gridCheck">
                                Compra parcelada
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 hidden parcelas">
                        <label for="parcelas" class="form-label">Quantidade de parcelas</label>
                        <input type="text" class="form-control" id="parcelas" placeholder="Quantidade de parcelas" name="parcelas">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="descricao" class="form-label">Descrição do lançamento</label>
                            <input type="text" class="form-control" id="descricao" placeholder="Descrição do lançamento" name="descricao">
                        </div>
                        <div class="col-md-4">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select id="categoria" class="form-select" name="categoria">
                                <option selected value="0">Selecione a categoria...</option>
                                <?php foreach($categorias as $c):?>
<<<<<<< HEAD
                                    <option value="<?=$c['nome_categoria'];?>"><?=$c['nome_categoria'];?></option>
=======
                                    <option value="<?=$c['id'];?>"><?=$c['nome_categoria'];?></option>
>>>>>>> 0ae16716cdb476c972964e6e2e8856807cd52f51
                                <?php endforeach; ?>
                             
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $render('footer'); ?>