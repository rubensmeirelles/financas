let menu = document.querySelector('.menu');
let sidebar = document.querySelector('.sidebar');
let topHeader = document.querySelector('.top-header');
let content = document.querySelector('.content');
let userData = document.querySelector('.user-data');
let itemMenu = document.querySelectorAll('.item-menu');

menu.addEventListener('click', function (){
    sidebar.classList.toggle('width-70');
    topHeader.classList.toggle('left-70');
    content.classList.toggle('left-70');
    userData.classList.toggle('hidden');
    for(let i = 0; i < itemMenu.length; i++){
        itemMenu[i].classList.toggle('hidden');
    }
});

let radioButtonCredito = document.querySelector('#gridCheck');
let radioButtonDebito = document.querySelector('#debito');
let qtdParcelas = document.querySelector('.parcelas');

radioButtonCredito.addEventListener('change', function() {
    if (this.checked)  {
        qtdParcelas.classList.remove('hidden');
    }
});

radioButtonDebito.addEventListener('change', function() {
    if (this.checked) {
        qtdParcelas.classList.add('hidden');
        document.getElementById('parcelas').value = ''; // Limpa o valor do input
    }
});



// new DataTable('#example');
var table = new DataTable('#tabelaLancamentos', {
    retrieve: true,
    language: {
        url: '../js/translate.json',
        // url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/pt-BR.json',
    },
    order: [[ 3, "desc" ]],
    lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
});

table.destroy();

//RECUPERAR ID PARA EXCLUIR

const deleteModal = new bootstrap.Modal(document.getElementById("exclusaoLancamentoModal"));

async function excluirLancamento(id) {
    const dados = await fetch('lancamentos.php?id=' + id);
    // const resposta = await dados.json();
    // deleteModal.show();
    document.getElementById('modalLancamentoId').value = ['dados'].url;
    console.log(dados);
}

function deleteLancamento(id){
    document.getElementById('modalLancamentoId').value;
    console.log(id);
}


    // document.addEventListener('DOMContentLoaded', function() {
    //     var modal = document.getElementById('exclusaoLancamentoModal');
    //     modal.addEventListener('show.bs.modal', function(event) {
    //         var button = event.relatedTarget; // Botão que acionou o modal
    //         var idLancamento = button.getAttribute('data-id'); // Pega o ID do botão
    //         document.getElementById('modalLancamentoId').textContent = idLancamento; // Exibe o ID no modal
    //     });
    // });








