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
                <tr>
                    <th scope="row">1</th>
                    <td>Receita</td>
                    <td>Banco do Brasil</td>
                    <td>04/04/2024</td>
                    <td>04/04/2024</td>
                    <td>4000</td>
                    <td>Salário</td>
                    <td>Salário</td>
                    <td>Abr</td>
                    <td>2024</td>
                    <td>1/1</td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Despesa</td>
                    <td>Nubank</td>
                    <td>07/04/2024</td>
                    <td>12/05/2024</td>
                    <td>180</td>
                    <td>Compra supermercado</td>
                    <td>Alimentação</td>
                    <td>Mai</td>
                    <td>2024</td>
                    <td>1/2</td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Despesa</td>
                    <td>Nubank</td>
                    <td>07/04/2024</td>
                    <td>12/06/2024</td>
                    <td>180</td>
                    <td>Compra supermercado</td>
                    <td>Alimentação</td>
                    <td>Jun</td>
                    <td>2024</td>
                    <td>2/2</td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Despesa</td>
                    <td>Banco do Brasil</td>
                    <td>07/04/2024</td>
                    <td>04/05/2024</td>
                    <td>250</td>
                    <td>Compra relógio</td>
                    <td>Tecnologia</td>
                    <td>Mai</td>
                    <td>2024</td>
                    <td>1/1</td>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
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
                <form class="row g-3">
                    <div class="col-md-3">
                        <label for="cartao" class="form-label">Tipo lançamento</label>
                        <select id="cartao" class="form-select">
                            <option selected>Selecione o tipo...</option>
                            <option>Receita</option>
                            <option>Despesa</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="cartao" class="form-label">Cartão</label>
                        <select id="cartao" class="form-select">
                            <option selected>Selecione o cartão...</option>
                            <option>Banco do Brasil</option>
                            <option>Nubank</option>
                            <option>Porto Seguro</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dataCompra" class="form-label">Data da compra</label>
                        <input type="date" class="form-control" id="dataCompra">
                    </div>
                    <div class="col-md-2">
                        <label for="dataVencimento" class="form-label">Data do vencimento</label>
                        <input type="date" class="form-control" id="dataVencimento">
                    </div>
                    <div class="col-md-2">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="valor" placeholder="Valor">
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Compra parcelada
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 hidden qtdParcelas">
                        <label for="qtdParcelas" class="form-label">Quantidade de parcelas</label>
                        <input type="text" class="form-control" id="qtdParcelas" placeholder="Quantidade de parcelas">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="descricao" class="form-label">Descrição do lançamento</label>
                            <input type="text" class="form-control" id="descricao" placeholder="Descrição do lançamento">
                        </div>
                        <div class="col-md-4">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" placeholder="Categoria">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $render('footer'); ?>